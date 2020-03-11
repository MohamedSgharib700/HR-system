<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('machine_code')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('position_id')->nullable();

            $table->string('insurance_number')->nullable();
            $table->string('national_id_number')->nullable();
            $table->string('medical_number')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('image')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('password');

            $table->boolean('gender')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('military_status')->nullable();

            $table->string('mobile_number', 100)->nullable();
            $table->string('landline_number', 100)->nullable();
            $table->string('local_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('special_graduation')->nullable();
            $table->string('university')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('graduation_grade')->nullable();
            $table->date('hiring_date')->nullable();
            $table->date('hiring_date_form_one')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->text('termination_reason')->nullable();
            $table->decimal('annual_vacation_balance')->nullable();
            $table->integer('net_salary')->nullable();
            $table->boolean('type');
            $table->boolean('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->text('token')->nullable();
            $table->text('token_expires_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
