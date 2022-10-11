<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catg_id')->unsigned();
            $table->string('blog_title',100)->unique();
            $table->date('blog_date')->nullable(true);
            $table->text('short_description')->nullable(true);
            $table->text('blog_content')->nullable(true);
            $table->text('keywords')->nullable(true);
            $table->text('metatags')->nullable(true);
            $table->string('url_slug',100)->unique();
            $table->integer('disp_order')->default(0)->nullable(true);
            $table->string('thump_image')->nullable(true);  
            $table->string('thump_alt')->nullable(true);  
            $table->string('image1')->nullable(true);  
            $table->string('image1_alt')->nullable(true);  
            $table->string('image2')->nullable(true);  
            $table->string('image2_alt')->nullable(true);  
            $table->string('image3')->nullable(true);  
            $table->string('image3_alt')->nullable(true);  
            $table->string('image4')->nullable(true);  
            $table->string('image4_alt')->nullable(true);  
            $table->string('image5')->nullable(true);  
            $table->string('image5_alt')->nullable(true);  
            $table->tinyInteger('status')->default('1');
            $table->foreign('catg_id')->references('id')->on('blg_categories')->onDelete('restrict');
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
        Schema::dropIfExists('blogs');
    }
}
