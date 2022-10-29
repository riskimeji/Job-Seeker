<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasOne;

class UserEmployee extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function bioEmployee(){

        return $this->hasOne(BioEmployee::class);
}

    public function employeeCompany()
{
    return $this->hasOne(EmployeeCompany::class,'employee_id');
}

}
