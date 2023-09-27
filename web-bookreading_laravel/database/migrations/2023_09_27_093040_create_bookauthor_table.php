<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookauthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->id();
            $table->string('author_name', 255);
            $table->string('author_slug', 255);
            $table->tinyInteger('author_gender')->default('0');
            $table->text('author_overview')->nullable();
            $table->string('author_image',255)->nullable();
            $table->tinyInteger('author_state')->default('0');

            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->useCurrentOnUpdate();
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
        Schema::dropIfExists('book_author');
    }
}
