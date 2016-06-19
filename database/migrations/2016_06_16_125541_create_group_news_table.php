<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_news', function (Blueprint $table) {
            $table->integer('news_id')->index()->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

            $table->integer('group_id')->index()->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_news');
    }
}
