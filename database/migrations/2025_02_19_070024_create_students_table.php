<?php

use App\Enums\StudentGender;
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
            $table->string('name');
            $table->string('lastname');
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->date('birth_date');
            $table->date('entry_date');
            $table->enum('gender', [StudentGender::MALE->value, StudentGender::FEMALE->value]);
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
