<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gens', function (Blueprint $table) {
            $table->id();
            $table->string('webtitle')->nullable(true);
            $table->text('description')->nullable(true);
            $table->text('metatags')->nullable(true);
            $table->text('google_analy')->nullable(true);
            $table->text('google_map')->nullable(true);
            $table->text('keywords')->nullable(true);
            $table->string('phone1')->nullable(true);
            $table->string('phone2')->nullable(true);
            $table->string('email1')->nullable(true);
            $table->string('email2')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('twitter')->nullable(true);
            $table->string('linkedin')->nullable(true);
            $table->string('youtube')->nullable(true);
            $table->string('google')->nullable(true);            
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
        Schema::dropIfExists('gens');
    }
}
