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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('membership_application_id')
            ->constrained('membership_applications')
            ->restrictOnDelete();

        $table->decimal('amount', 12, 2);
        $table->string('method', 30)->default('bank_transfer');
        $table->string('status', 20)->default('pending');

        $table->string('proof_path')->nullable();
        $table->string('reference_number', 100)->nullable();
        $table->text('notes')->nullable();

        $table->foreignId('verified_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamp('verified_at')->nullable();

        $table->index('status');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('payments');
}
};
