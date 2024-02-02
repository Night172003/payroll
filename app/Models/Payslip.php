<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    protected $fillable = [
        'EmpIdInput', 'PresentDaysInput', 'PayPeriodStartDate', 'PayPeriodEndDate',
        'BasicSalaryInput', 'totalAllowance', 'totalDeduction', 'netPay',
        // Add other fields as needed
    ];
}
