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
        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('model', 100);
            $table->unsignedBigInteger('marka_id');
            $table->foreign('marka_id')->references('id')->on('markas');            
            $table->unsignedBigInteger('rodzaj_id');
            $table->foreign('rodzaj_id')->references('id')->on('rodz_pojazdows');            
            $table->boolean('active')->default(true);           
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modeles');
    }
};
