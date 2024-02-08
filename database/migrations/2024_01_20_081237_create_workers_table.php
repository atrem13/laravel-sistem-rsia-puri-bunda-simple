<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_occupation_id')->nullable();
            $table->string('second_occupation_id')->nullable();
            $table->string('img')->nullable();
            $table->string('name')->unique();
            $table->string('address');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('join_date');
            $table->softDeletes();
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
        Schema::dropIfExists('worker');
    }
}
