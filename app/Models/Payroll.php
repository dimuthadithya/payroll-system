<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
        'basic_salary',
        'total_allowances',
        'total_deductions',
        'net_salary',
        'month',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
