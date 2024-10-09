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
        Schema::create('kerjasamas', function (Blueprint $table) {

                $table->id();

                // Explicit foreign key references
                $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('mitra_id')->constrained('mitras')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('kecamatan_id')->constrained('kecamatans')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('survey_id')->constrained('surveys')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('subsurvey1_id')->constrained('subsurvey1s')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('subsurvey2_id')->constrained('subsurvey2s')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('jenis_id')->constrained('jenis')->onUpdate('cascade')->onDelete('cascade');
                $table->date('date');
                $table->integer('honor');
                $table->string('bulan');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasamas');
    }
};
