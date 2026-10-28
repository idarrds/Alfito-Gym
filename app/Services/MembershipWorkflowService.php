<?php

namespace App\Services;

use App\Models\Membership;
use App\Models\MembershipApplication;
use App\Models\MembershipPlan;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MembershipWorkflowService
{
    public function createApplication(
        User $user,
        int $planId
    ): MembershipApplication {
        $this->ensureMember($user);

        $plan = MembershipPlan::query()
            ->where('is_active', true)
            ->findOrFail($planId);

        return MembershipApplication::create([
            'user_id' => $user->id,
            'membership_plan_id' => $plan->id,
            'price_snapshot' => $plan->price,
            'duration_months_snapshot' => $plan->duration_months,
            'status' => 'pending',
        ]);
    }

    public function reviewApplication(
        int $applicationId,
        User $admin,
        string $decision,
        ?string $notes = null
    ): MembershipApplication {
        $this->ensureAdmin($admin);

        if (!in_array($decision, ['approve', 'reject'], true)) {
            throw ValidationException::withMessages([
                'decision' => 'Keputusan tidak valid.',
            ]);
        }

        return DB::transaction(function () use (
            $applicationId,
            $admin,
            $decision,
            $notes
        ) {
            $application = MembershipApplication::query()
                ->lockForUpdate()
                ->findOrFail($applicationId);

            if ($application->status !== 'pending') {
                throw ValidationException::withMessages([
                    'application' => 'Pengajuan sudah ditinjau.',
                ]);
            }

            $application->update([
                'status' => $decision === 'approve'
                    ? 'awaiting_payment'
                    : 'rejected',
                'reviewed_by' => $admin->id,
                'reviewed_at' => now(),
                'admin_notes' => $notes,
            ]);

            return $application->refresh();
        });
    }

    public function recordPayment(
        int $applicationId,
        User $user,
        string $proofPath,
        ?string $referenceNumber = null
    ): Payment {
        $this->ensureMember($user);

        return DB::transaction(function () use (
            $applicationId,
            $user,
            $proofPath,
            $referenceNumber
        ) {
            $application = MembershipApplication::query()
                ->where('user_id', $user->id)
                ->lockForUpdate()
                ->findOrFail($applicationId);

            if ($application->status !== 'awaiting_payment') {
                throw ValidationException::withMessages([
                    'application' => 'Pengajuan belum dapat dibayar.',
                ]);
            }

            $hasUnresolvedPayment = $application->payments()
                ->whereIn('status', ['pending', 'verified'])
                ->exists();

            if ($hasUnresolvedPayment) {
                throw ValidationException::withMessages([
                    'payment' => 'Masih ada pembayaran yang perlu diproses.',
                ]);
            }

            return $application->payments()->create([
                'amount' => $application->price_snapshot,
                'method' => 'bank_transfer',
                'status' => 'pending',
                'proof_path' => $proofPath,
                'reference_number' => $referenceNumber,
            ]);
        });
    }

    public function decidePayment(
        int $paymentId,
        User $admin,
        bool $approved,
        ?string $notes = null
    ): Payment {
        $this->ensureAdmin($admin);

        return DB::transaction(function () use (
            $paymentId,
            $admin,
            $approved,
            $notes
        ) {
            $payment = Payment::query()
                ->lockForUpdate()
                ->findOrFail($paymentId);

            $application = MembershipApplication::query()
                ->lockForUpdate()
                ->findOrFail($payment->membership_application_id);

            if ($payment->status !== 'pending') {
                throw ValidationException::withMessages([
                    'payment' => 'Pembayaran sudah diproses.',
                ]);
            }

            if ($application->status !== 'awaiting_payment') {
                throw ValidationException::withMessages([
                    'application' => 'Pengajuan tidak sedang menunggu pembayaran.',
                ]);
            }

            $payment->update([
                'status' => $approved ? 'verified' : 'rejected',
                'verified_by' => $admin->id,
                'verified_at' => now(),
                'notes' => $notes,
            ]);

            if (!$approved) {
                return $payment->refresh();
            }

            if ($application->membership()->exists()) {
                throw ValidationException::withMessages([
                    'membership' => 'Membership untuk pengajuan ini sudah ada.',
                ]);
            }

            $startsAt = now();
            $endsAt = $startsAt->copy()->addMonthsNoOverflow(
                (int) $application->duration_months_snapshot
            );

            Membership::create([
                'user_id' => $application->user_id,
                'membership_plan_id' => $application->membership_plan_id,
                'membership_application_id' => $application->id,
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
            ]);

            $application->update([
                'status' => 'approved',
            ]);

            return $payment->refresh();
        });
    }

    private function ensureAdmin(User $user): void
    {
        if ($user->role !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }
    }

    private function ensureMember(User $user): void
    {
        if ($user->role !== 'member') {
            abort(403, 'Fitur ini hanya untuk member.');
        }
    }
}
