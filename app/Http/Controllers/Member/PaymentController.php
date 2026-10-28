<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\MembershipWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PaymentController extends Controller
{
    public function __construct(
        private MembershipWorkflowService $workflow
    ) {}

    public function store(
        Request $request,
        int $application
    ): RedirectResponse {
        abort_unless(
            $request->user()->role === 'member',
            403
        );

        $validated = $request->validate([
            'proof' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],
            'reference_number' => [
                'nullable',
                'string',
                'max:100',
            ],
        ]);

        // Simpan file pada storage lokal, bukan folder publik.
        $path = $request->file('proof')
            ->store('payment-proofs', 'local');

        try {
            $this->workflow->recordPayment(
                $application,
                $request->user(),
                $path,
                $validated['reference_number'] ?? null
            );
        } catch (Throwable $exception) {
            // Hapus file jika pencatatan pembayaran gagal.
            Storage::disk('local')->delete($path);

            throw $exception;
        }

        return redirect()
            ->route('member.applications.index')
            ->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}