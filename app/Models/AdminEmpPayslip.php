<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEmpPayslip extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'EmpID',
        'FirstName',
        'MiddleName',
        'LastName',
        'JobName',
        'EmpType',
        'Date',
        'PunchIn',
        'PunchOut',
    ];
}
