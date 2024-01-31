<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEmpPayslip extends Model
{
    use HasFactory;

    protected $table = 'admin_emp_payslips';

    protected $fillable = [
        'EmpID', 'CredID', 'JobID', 'LastName', 'FirstName', 'MiddleName',
        'Birthday', 'Address', 'PhoneNumber', 'EmpType',
        'JobName', 'JobDescription', 'Email', 'PunchIn', 'PunchOut',
        'StartDate', 'EndDate', 'Reason', 'Status',
    ];

    public function empAttendances()
    {
        return $this->hasMany(EmpAttendance::class, 'emp_id', 'EmpID');
    }
}
