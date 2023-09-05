<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->integer('quantity');
            $table->mediumText('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fruits');
    }
};
