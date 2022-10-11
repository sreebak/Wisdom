<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image_title',100)->nullable(true);
            $table->text('short_description')->nullable(true);
            $table->string('readmore_txt',20)->nullable(true);
            $table->string('url_slug',100)->nullable(true);
            $table->integer('disp_order')->default(0)->nullable(true);            
            $table->string('image1');
            $table->string('image1_alt')->nullable(true);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('sliders');
    }
}
