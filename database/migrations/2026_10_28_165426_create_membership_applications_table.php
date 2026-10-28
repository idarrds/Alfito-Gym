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
    Schema::create('membership_applications', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained('users')
            ->restrictOnDelete();

        $table->foreignId('membership_plan_id')
            ->constrained('membership_plans')
            ->restrictOnDelete();

        $table->decimal('price_snapshot', 12, 2);
        $table->string('status', 30)->default('pending');

        $table->foreignId('reviewed_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamp('reviewed_at')->nullable();
        $table->text('admin_notes')->nullable();

        $table->index('status');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('membership_applications');
}
};
