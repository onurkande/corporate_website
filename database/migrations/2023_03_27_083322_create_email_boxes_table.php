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
        Schema::create('email_boxes', function (Blueprint $table) {
            //$table->id();
            $table->bigInteger('id')->default(1);
            $table->string('title')->nullable();;
            $table->string('content')->nullable();;
            $table->string('button')->nullable();;
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
        Schema::dropIfExists('email_boxes');
    }
};
