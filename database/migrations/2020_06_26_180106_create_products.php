<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catg_id')->unsigned();
            $table->bigInteger('sub_catg_id')->unsigned()->nullable(true);
            $table->string('product_code',20)->unique();
            $table->string('product_name',100)->unique();
            $table->text('short_description')->nullable(true);
            $table->text('long_description')->nullable(true);
            $table->decimal('product_value',12,2)->nullable(true);
            $table->dateTime('start_date')->nullable(true);
            $table->dateTime('end_date')->nullable(true);
            $table->bigInteger('tutor_id')->unsigned();
            $table->text('keywords')->nullable(true);
            $table->string('url_slug',100)->unique();
            $table->integer('disp_order')->default(0)->nullable(true);
            $table->string('thump_image')->nullable(true);  
            $table->string('image1')->nullable(true);  
            $table->string('image2')->nullable(true);  
            $table->string('image3')->nullable(true);  
            $table->string('image4')->nullable(true);  
            $table->string('image5')->nullable(true);  
            $table->string('thump_alt')->nullable(true);  
            $table->string('image1_alt')->nullable(true);  
            $table->string('image2_alt')->nullable(true);  
            $table->string('image3_alt')->nullable(true);  
            $table->string('image4_alt')->nullable(true);  
            $table->string('image5_alt')->nullable(true);  
            $table->tinyInteger('status')->default('1');
            $table->foreign('catg_id')->references('id')->on('pdt_categories')->onDelete('restrict');
            //$table->foreign('sub_catg_id')->references('id')->on('pdt_sub_categories')->onDelete('restrict');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('restrict');
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
        Schema::dropIfExists('products');
    }
}
