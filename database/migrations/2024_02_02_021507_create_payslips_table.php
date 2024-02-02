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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->integer('present_days');
            $table->date('pay_period_start_date');
            $table->date('pay_period_end_date');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('total_allowance', 10, 2);
            $table->decimal('total_deduction', 10, 2);
            $table->decimal('net_pay', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
