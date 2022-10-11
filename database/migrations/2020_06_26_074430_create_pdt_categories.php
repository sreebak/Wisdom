<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdtCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdt_categories', function (Blueprint $table) {
            $table->id();
            $table->string('catg_name',50)->unique();
            $table->text('short_description')->nullable(true);
            $table->text('long_description')->nullable(true);            
            $table->string('url_slug',100)->unique();
            $table->integer('disp_order')->default(0)->nullable(true);
            $table->string('image')->nullable(true);           
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
        Schema::dropIfExists('pdt_categories');
    }
}
