<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'surname', 'patronymic', 'gender', 'wages', 'department',
    ];
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_employee', 'employee_id', 'department_id');
    }
}
