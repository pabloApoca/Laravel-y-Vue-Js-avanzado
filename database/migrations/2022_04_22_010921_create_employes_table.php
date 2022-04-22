<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
           //$table->increments('id');
            $table->string('names');
            $table->string('last_name');
            $table->integer('dni');
            $table->string('email')->unique();
            $table->enum('gender',['male', 'female', 'unspecified']);
            $table->enum('status_marital',['single', 'married']);
            $table->integer('phone');
            $table->timestamps();
            //createdAt
            //updateAt
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
