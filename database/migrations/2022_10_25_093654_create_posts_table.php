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
            Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('age_bracket');
            $table->string('education_level');
            $table->string('employment_status');
            $table->integer('meals_before');
            $table->integer('meals_during');
            $table->integer('shelterDisturbance');
            $table->integer('disagreements');
            $table->integer('disrespect');
            $table->integer('fighting');
            $table->integer('quarrels');
            $table->integer('seperation');
            $table->integer('emotional_distress');
            $table->integer('outcomeBehaviours');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
