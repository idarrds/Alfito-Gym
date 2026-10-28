<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('memberships', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained('users')
            ->restrictOnDelete();

        $table->foreignId('membership_plan_id')
            ->constrained('membership_plans')
            ->restrictOnDelete();

        $table->foreignId('membership_application_id')->unique();

        $table->foreign('membership_application_id')
            ->references('id')
            ->on('membership_applications')
            ->restrictOnDelete();

        $table->timestamp('starts_at');
        $table->timestamp('ends_at');
        $table->timestamp('cancelled_at')->nullable();

        $table->index('ends_at');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('memberships');
}
};
