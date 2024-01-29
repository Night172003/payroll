<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_emp_payslips', function (Blueprint $table) {
            $table->id();
            $table->integer('EmpID')->unique();
            $table->integer('CredID');
            $table->integer('JobID');
            $table->string('LastName');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->date('Birthday');
            $table->text('Address');
            $table->string('PhoneNumber');
            $table->string('EmpType');
            $table->string('JobName');
            $table->text('JobDescription');
            $table->string('Email');
            $table->time('PunchIn')->nullable();
            $table->time('PunchOut')->nullable();
            $table->date('StartDate')->nullable();
            $table->date('EndDate')->nullable();
            $table->text('Reason')->nullable();
            $table->integer('Status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_emp_payslips');
    }
};
