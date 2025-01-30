<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('working_hours')->nullable();
            $table->json('icons')->nullable();
            $table->json('icon_urls')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('headers');
    }
}; 