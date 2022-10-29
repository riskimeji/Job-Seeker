<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCompany extends Model
{
    use HasFactory;

    public function userCompany()
    {
        return $this->belongsTo(UserCompany::class, 'company_id');
    }

    public function userEmployee()
    {
        return $this->belongsTo(UserEmployee::class, 'employee_id');
    }
}
