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
            $table->integer('EmpID');
            $table->string('FirstName');
            $table->string('MiddleName');
            $table->string('LastName');
            $table->string('JobName');
            $table->string('EmpType');
            $table->date('Date');
            $table->time('PunchIn');
            $table->time('PunchOut')->nullable();
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
