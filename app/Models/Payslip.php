<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'name',
        'position',
        'pay_period',
        'emp_type',
    ];
}
