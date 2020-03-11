<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('hr_id')->nullable();
            $table->string('phone')->nullable();
            $table->integer('department_id');
            $table->integer('position_id');
            $table->integer('vacation_type')->nullable();
            $table->integer('duration')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('address_during_vacation')->nullable();
            $table->string('notes')->nullable();
            $table->string('hr_notes')->nullable();
            $table->integer('manager_approve')->default(0);
            $table->integer('hr_approve')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
