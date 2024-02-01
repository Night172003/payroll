<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    protected $table = 'employee_leave'; // Adjust the table name as needed

    protected $fillable = [
        'emp_id', 'leave_id', 'start_date', 'end_date', 'reason', 'status',
        // Add other fillable fields as needed
    ];
}
