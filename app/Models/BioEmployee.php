<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasOne;

class BioEmployee extends Model
{
    use HasFactory;
    protected $guarded=[];

public function userEmployee()
{
    return $this->belongsTo(UserEmployee::class);
}

}
