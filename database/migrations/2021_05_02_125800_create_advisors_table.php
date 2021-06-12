<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('institution');
            $table->string('department');
            $table->string('passing_year');
            $table->string('profession');
            $table->string('job_title');
            $table->string('job_location')->nullable();
            $table->string('phone');
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
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
        Schema::dropIfExists('advisors');
    }
}
