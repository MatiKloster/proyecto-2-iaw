<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('movieId');
            $table->string('name');
            $table->string('director');
            $table->mediumText('cover');
            $table->date('year');
            $table->string('genre');
            $table->time('duration')->nullable();
            $table->text('description')->nullable();
            $table->text('staring')->nullable();
            $table->integer('quantity');
            $table->decimal('price',8,2);
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
        Schema::dropIfExists('movies');
    }
}
