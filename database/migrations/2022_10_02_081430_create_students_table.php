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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->boolean('hobbies1')->default(false);
            $table->boolean('hobbies2')->default(false);
            $table->boolean('hobbies3')->default(false);

            $table->string('nationality');

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
        Schema::dropIfExists('students');
    }
};
