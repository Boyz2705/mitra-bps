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
            // Add the datebayar column
            $table->date('datebayar')->nullable(); // Nullable date field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kerjasamas', function (Blueprint $table) {
            // Drop the datebayar column
            $table->dropColumn('datebayar');
        });
    }
};
