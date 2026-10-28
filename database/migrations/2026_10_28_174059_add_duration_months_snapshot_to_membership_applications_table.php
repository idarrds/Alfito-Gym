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
    Schema::table('membership_applications', function (Blueprint $table) {
        $table->unsignedTinyInteger('duration_months_snapshot')
            ->default(1)
            ->after('price_snapshot');
    });
}

public function down(): void
{
    Schema::table('membership_applications', function (Blueprint $table) {
        $table->dropColumn('duration_months_snapshot');
    });
}
};
