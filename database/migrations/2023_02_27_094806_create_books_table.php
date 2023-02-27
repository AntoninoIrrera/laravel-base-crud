<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('author', 100)->nullable();
            $table->date('publication_date')->nullable();
            $table->text('description')->nullable();
            $table->string('genre', 100);
            $table->text('cover_image')->nullable();
            $table->string('ISBN', 13)->unique();
            $table->float('price', 6, 2);
            $table->string('editor', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};