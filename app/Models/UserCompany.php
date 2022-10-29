<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function bioCompany()
    {
        return $this->hasOne(BioCompany::class);
    }

    public function employeeCompany()
    {
        return $this->hasMany(EmployeeCompany::class,'company_id');
    }
}
