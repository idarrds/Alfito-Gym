<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\MembershipWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(
        private MembershipWorkflowService $workflow
    ) {}

    public function index(): View
    {
        $payments = Payment::query()
            ->with([
                'application.user',
                'application.membershipPlan',
                'verifier',
            ])
            ->latest()
            ->get();

        return view('admin.payments.index', compact(
            'payments'
        ));
    }

    public function update(
        Request $request,
        int $payment
    ): RedirectResponse {
        $validated = $request->validate([
            'decision' => [
                'required',
                'in:approve,reject',
            ],
            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $this->workflow->decidePayment(
            $payment,
            $request->user(),
            $validated['decision'] === 'approve',
            $validated['notes'] ?? null
        );

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Pembayaran berhasil diproses.');
    }

    public function proof(int $payment)
    {
        $record = Payment::findOrFail($payment);

        abort_unless(
            $record->proof_path &&
            Storage::disk('local')->exists($record->proof_path),
            404
        );

        // File hanya dapat diakses melalui route admin.
        return response(
            Storage::disk('local')->get($record->proof_path)
        );
    }
}