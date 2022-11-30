<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_art', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('art_id');

            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('art_id')->references('id')->on('art')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('artist_art', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
            $table->dropForeign(['art_id']);
        Schema::dropIfExists('artist_art');
           });
    }
};