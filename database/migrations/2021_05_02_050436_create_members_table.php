<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('institution');
            $table->string('department');
            $table->string('session');
            $table->string('college');
            $table->string('high_school');
            $table->string('blood_group');
            $table->string('village');
            $table->string('post_office');
            $table->string('union');
            $table->string('current_address');
            $table->string('phone');
            $table->string('image');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('members');
    }
}
