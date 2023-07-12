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
        Schema::create('przeglads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rejestracja_id');
            $table->foreign('rejestracja_id')->references('id')->on('rejestracjas');            
            $table->date('dataprzegladu'); // zazwyczaj dziś
            $table->date('datanastprzegladu'); // zalezy od pierwszej rejestracji rodzaju, paliwa,
            $table->text('uwagi')->nullable();
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('przeglads');
    }
};
