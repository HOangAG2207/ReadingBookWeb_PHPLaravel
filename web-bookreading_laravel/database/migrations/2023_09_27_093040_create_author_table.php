<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('id');

            $table->string('author_name', 255);
            $table->string('author_slug', 255);
            $table->tinyInteger('author_gender')->default('0');
            $table->text('author_overview')->nullable();
            $table->string('author_image',255)->nullable();
            $table->tinyInteger('author_status')->default('0');

            $table->integer('created_by');

            $table->timestamps();
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
        Schema::dropIfExists('author');
    }
}
