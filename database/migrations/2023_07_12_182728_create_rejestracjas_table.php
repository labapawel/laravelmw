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
        Schema::create('rejestracjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('osoba_id');
            $table->foreign('osoba_id')->references('id')->on('osobas');
            $table->string('rej',20);
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('modeles');
            $table->date('perwszarej');
            $table->unsignedBigInteger('rodzpaliwa_id');
            $table->foreign('rodzpaliwa_id')->references('id')->on('rodzpaliwas');
            $table->text('uwagi')->nullable();
            $table->boolean('active')->default(true);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejstracjas');
    }
};
