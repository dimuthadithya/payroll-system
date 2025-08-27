<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'employee_id',
        'name',
        'email',
        'phone',
        'department',
        'position',
        'basic_salary',
        'bank_account',
        'joined_at',
    ];

    protected $casts = [
        'joined_at' => 'date',  // automatically converts to Carbon
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
