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
        Schema::create('wiadomoscs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('osoba_id');
            $table->foreign('osoba_id')->references('id')->on('osobas');   
            $table->date('datawyslania');
            $table->longText('tresc');
            $table->enum('status',['dowyslania','wyslane']);
            $table->date('datawyslane')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiadomoscs');
    }
};
