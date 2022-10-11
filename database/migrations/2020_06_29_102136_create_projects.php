<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catg_id')->unsigned();
            $table->string('project_code',20)->unique();
            $table->string('project_name',50)->unique();
            $table->string('project_type',50)->nullable(true);
            $table->string('client_name',50)->nullable(true);
            $table->string('location',50)->nullable(true);
            $table->date('project_date1')->nullable(true);
            $table->date('project_date2')->nullable(true);
            $table->text('short_description')->nullable(true);
            $table->text('long_description')->nullable(true);
            $table->decimal('project_value',12,2)->nullable(true);
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
            $table->foreign('catg_id')->references('id')->on('pjx_categories')->onDelete('restrict');
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
        Schema::dropIfExists('projects');
    }
}
