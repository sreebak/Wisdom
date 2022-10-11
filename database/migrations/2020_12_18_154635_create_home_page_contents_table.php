<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('banner1_title1',150)->nullable(true);
            $table->string('banner1_title2',150)->nullable(true);
            $table->text('banner1_description');
            $table->string('school_count',50)->nullable(true);
            $table->string('review_count',50)->nullable(true);
            $table->string('note_count',50)->nullable(true);
            $table->string('banner2_title',150)->nullable(true);
            $table->text('banner2_description');
            $table->string('resources_title',100)->nullable(true);
            $table->text('resources_description');
            $table->text('google_description1');
            $table->text('google_description2');
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
        Schema::dropIfExists('home_page_contents');
    }
}
