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
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('genre_name', 255);
            $table->string('genre_slug', 255);
            $table->text('genre_description')->nullable();
            $table->tinyInteger('genre_status')->default('0');
            
            $table->unique('genre_name');

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            // $table->timestamps();
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
        Schema::dropIfExists('genre');
    }
};
