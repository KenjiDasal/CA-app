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

    //This method creates a table for an Artist

    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('artist');
            $table->string('bio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //this method deletes the table and recreates it.

    public function down()
    {
        Schema::dropIfExists('artists');
    }
};