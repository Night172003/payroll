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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('EmpID')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('JobName');
            $table->date('PayPeriodStartDate');
            $table->date('PayPeriodEndDate');
            $table->decimal('BasicSalary', 10, 2);
            $table->decimal('NetPay', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
