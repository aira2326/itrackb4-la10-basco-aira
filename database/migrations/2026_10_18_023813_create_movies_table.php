<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');             // short text
            $table->string('director');          // short text
            $table->integer('year');             // whole number
            $table->boolean('is_featured');      // true or false
            $table->text('synopsis')->nullable();// may be left empty
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};