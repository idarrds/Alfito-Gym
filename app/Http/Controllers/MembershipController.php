<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\View\View;

class MembershipController extends Controller
{
    public function index(): View
    {
        $plans = MembershipPlan::where('is_active', true)
            ->orderBy('price')
            ->get();

        return view('pages.membership', compact('plans'));
    }
}
