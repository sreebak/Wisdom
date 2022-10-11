<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',150)->nullable(true);
            $table->string('phone',30)->nullable(true);
            $table->string('project_title',100)->nullable(true);
            $table->string('project_details',255)->nullable(true);
            $table->string('project_link',255)->nullable(true);
            $table->string('facebook',150)->nullable(true);
            $table->string('twiter',150)->nullable(true);
            $table->string('linkedin',150)->nullable(true);
            $table->string('designation',100)->nullable(true);
            $table->string('company',100)->nullable(true);
            $table->text('message')->nullable(true);
            $table->string('image1')->nullable(true); 
            $table->string('image1_alt')->nullable(true);
            $table->integer('disp_order')->default(0)->nullable(true);
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
        Schema::dropIfExists('testimonials');
    }
}
