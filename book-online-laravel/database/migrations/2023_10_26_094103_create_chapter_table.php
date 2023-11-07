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
        Schema::create('chapter', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('chapter_number', 50);
            $table->string('chapter_slug', 255);
            $table->string('chapter_name', 255)->nullable();
            $table->longText('chapter_content')->nullable();
            $table->tinyInteger('chapter_status')->default('0');

            $table->unsignedInteger('book_id');
            $table->foreign('book_id')
                ->references('id')->on('book')
                ->onDelete('cascade');

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('chapter');
    }
};
