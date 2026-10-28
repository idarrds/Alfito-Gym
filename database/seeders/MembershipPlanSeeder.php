<?php

namespace Database\Seeders;

use App\Models\MembershipPlan;
use Illuminate\Database\Seeder;

class MembershipPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Essential Monthly',
                'price' => 350000,
                'duration_months' => 1,
            ],
            [
                'name' => 'Performance Quarterly',
                'price' => 900000,
                'duration_months' => 3,
            ],
            [
                'name' => 'Elite Annual',
                'price' => 3000000,
                'duration_months' => 12,
            ],
        ];

        foreach ($plans as $plan) {
            MembershipPlan::firstOrCreate(
                ['name' => $plan['name']],
                [
                    'price' => $plan['price'],
                    'duration_months' => $plan['duration_months'],
                    'is_active' => true,
                ]
            );
        }
    }
}