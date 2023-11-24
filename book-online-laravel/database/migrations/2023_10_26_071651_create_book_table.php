<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('book_name', 255);
            $table->string('book_slug', 255);
            $table->longText('book_description')->nullable();
            $table->string('book_image', 255)->nullable();
            $table->tinyInteger('book_status')->default('0');
            $table->bigInteger('book_view')->default('0');

            // $table->unsignedInteger('genre_id')->nullable();
            // $table->foreign('genre_id')
            //     ->references('id')->on('genre')
            //     ->onDelete('set null');

            $table->unique('book_name');

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
};
