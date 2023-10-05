<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');

            $table->string('category_name', 255);
            $table->string('category_slug', 255);
            $table->text('category_description')->nullable();
            $table->string('category_image',255)->nullable();
            $table->tinyInteger('category_status')->default('0');

            $table->integer('created_by');

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
        Schema::dropIfExists('category');
    }
}
