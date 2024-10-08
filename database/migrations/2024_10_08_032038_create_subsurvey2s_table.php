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
        Schema::create('subsurvey2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_survey')->constrained('surveys')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_subsurvey1')->constrained('subsurvey1s')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_subsurvey2s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsurvey2s');
    }
};
