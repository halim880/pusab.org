<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admit_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->unique();
            $table->foreignId('center_id');
            $table->foreignId('exam_id')->nullable();
            $table->integer('room_number')->nullable();
            $table->integer('sit_number')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('admit_cards');
    }
}
