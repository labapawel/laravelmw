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
        Schema::create('osobas', function (Blueprint $table) {
            $table->id();
            $table->string('imie',70);
            $table->string('nazwisko',70);
            $table->string('telefon', 50)->nullable();
            $table->string('email',100)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('osobas');
    }
};
