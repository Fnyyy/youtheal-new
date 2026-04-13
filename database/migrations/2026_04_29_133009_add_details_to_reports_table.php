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
        Schema::table('reports', function (Blueprint $table) {
            $table->string('perpetrator_name')->nullable()->after('category_id');
            $table->string('incident_location')->nullable()->after('perpetrator_name');
            $table->date('incident_date')->nullable()->after('incident_location');
            $table->string('severity')->nullable()->after('incident_date'); // Ringan, Sedang, Parah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['perpetrator_name', 'incident_location', 'incident_date', 'severity']);
        });
    }
};
