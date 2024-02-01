<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['EmpID', 'FirstName', 'LastName', 'JobName', 'PayPeriodStartDate', 'PayPeriodEndDate', 'BasicSalary', 'NetPay'];

    public function allowances()
    {
        return $this->hasMany(Allowance::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
}
