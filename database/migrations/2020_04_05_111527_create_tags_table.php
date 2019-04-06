<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('theme_id');

            $table->bigInteger('screen_id')->unsigned();
            $table->foreign('screen_id')->references('id')->on('screens')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('type', ["MaterialColor", "String", "Double", "Integer"]);
            $table->string('key');
            $table->string('value');
            $table->text('description');
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
        Schema::dropIfExists('tags');
    }
}
