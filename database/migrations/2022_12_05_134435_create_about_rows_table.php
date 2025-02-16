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
        Schema::create('about_rows', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->json('icon')->nullable();
            $table->json('header')->nullable();
            $table->json('paragraph')->nullable();
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
        Schema::dropIfExists('about_rows');
    }
};
