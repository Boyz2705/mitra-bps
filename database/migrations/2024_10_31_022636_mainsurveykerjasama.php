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
        Schema::table('kerjasamas', function (Blueprint $table) {
            $table->foreignId('mainsurvey_id')->nullable()->constrained('mainsurveys')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kerjasamas', function (Blueprint $table) {
            $table->dropForeign(['mainsurvey_id']);
            $table->dropColumn('mainsurvey_id');
        });
    }
};
