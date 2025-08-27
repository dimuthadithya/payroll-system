<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function newUsers()
    {
        $newUsers = User::where('role', 'new')->get();

        return view('users.new', compact('newUsers'));
    }

    public function toggleRole(User $user)
    {
        if ($user->role === 'new') {
            // Change to employee
            $user->role = 'employee';
            $user->save();

            // Generate unique employee_id (e.g., EMP001, EMP002…)
            $lastEmployee = Employee::latest('id')->first();
            $nextId = $lastEmployee ? ((int) filter_var($lastEmployee->employee_id, FILTER_SANITIZE_NUMBER_INT)) + 1 : 1;
            $employeeId = 'EMP' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

            // Insert into employees table
            Employee::create([
                'user_id' => $user->id,
                'employee_id' => $employeeId,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => null, // default empty
                'department' => 'Not Assigned',
                'position' => 'Not Assigned',
                'basic_salary' => 0.00,
                'bank_account' => null,
                'joined_at' => now(),
            ]);
        } else {
            // Change back to new
            $user->role = 'new';
            $user->save();

            // Optional: Remove employee record
            Employee::where('user_id', $user->id)->delete();
        }

        return back()->with('success', 'User role updated and synced with employees!');
    }
}
