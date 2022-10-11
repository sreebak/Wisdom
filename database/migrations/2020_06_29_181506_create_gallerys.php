<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catg_id')->unsigned();
            $table->string('image_title',50)->nullable(true);
            $table->text('short_description')->nullable(true);
            $table->string('url_slug',100)->unique();
            $table->integer('disp_order')->default(0)->nullable(true);            
            $table->string('thump_image')->nullable(true);  
            $table->string('thump_alt')->nullable(true); 
            $table->string('image1')->nullable(true);  
            $table->string('image1_alt')->nullable(true);
            $table->tinyInteger('status')->default('1');
            $table->foreign('catg_id')->references('id')->on('gly_categories')->onDelete('restrict');
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
        Schema::dropIfExists('gallerys');
    }
}
