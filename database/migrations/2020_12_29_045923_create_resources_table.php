<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title',150);
            $table->text('description');
            $table->string('owner',150)->nullable(true);
            $table->dateTime('start_date');
            $table->string('views',100)->nullable(true);
            $table->string('file',250)->nullable(true); 
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('resources');
    }
}
