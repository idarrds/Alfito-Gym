<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\MembershipPlan;
use App\Services\MembershipWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MembershipApplicationController extends Controller
{
    public function __construct(
        private MembershipWorkflowService $workflow
    ) {}

    /**
     * Memastikan pengguna yang login adalah member.
     */
    private function ensureMember(Request $request): void
    {
        $user = $request->user();

        abort_unless(
            $user !== null
            && strtolower(trim((string) $user->role)) === 'member',
            403
        );
    }

    /**
     * Menampilkan halaman pengajuan membership.
     */
    public function index(Request $request): View
    {
        $this->ensureMember($request);

        $user = $request->user();

        $plans = MembershipPlan::query()
            ->where('is_active', true)
            ->orderBy('price')
            ->get();

        $applications = $user
            ->applications()
            ->with([
                'membershipPlan',
                'payments',
                'membership',
            ])
            ->latest()
            ->get();

        return view(
            'member.applications.index',
            compact('plans', 'applications')
        );
    }

    /**
     * Membuat pengajuan membership baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->ensureMember($request);

        $validated = $request->validate([
            'membership_plan_id' => [
                'required',
                'integer',
                'exists:membership_plans,id',
            ],
        ]);

        $this->workflow->createApplication(
            $request->user(),
            (int) $validated['membership_plan_id']
        );

        return redirect()
            ->route('member.applications.index')
            ->with(
                'success',
                'Pengajuan membership berhasil dibuat.'
            );
    }
}
