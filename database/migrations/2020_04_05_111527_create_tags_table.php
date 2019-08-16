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

            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('theme_id')->unsigned();
            $table->foreign('theme_id')->references('id')->on('themes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('screen_id')->unsigned();
            $table->foreign('screen_id')->references('id')->on('screens')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('type');
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
