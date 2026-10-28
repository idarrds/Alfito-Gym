<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use App\Services\MembershipWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MembershipApplicationController extends Controller
{
    public function __construct(
        private MembershipWorkflowService $workflow
    ) {}

    public function index(): View
    {
        $applications = MembershipApplication::query()
            ->with([
                'user',
                'membershipPlan',
                'reviewer',
            ])
            ->latest()
            ->get();

        return view('admin.applications.index', compact(
            'applications'
        ));
    }

    public function update(
        Request $request,
        int $application
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

        $this->workflow->reviewApplication(
            $application,
            $request->user(),
            $validated['decision'],
            $validated['notes'] ?? null
        );

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Pengajuan berhasil diproses.');
    }
}