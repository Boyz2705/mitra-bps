<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitra_sasaran_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('cascade');
            $table->year('tahun');
            $table->boolean('tepat_sasaran');
            $table->integer('total_honor');
            $table->timestamps();

            $table->unique(['mitra_id', 'tahun']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra_sasaran_pivot');
    }
};
