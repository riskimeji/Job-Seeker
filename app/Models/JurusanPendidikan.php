<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanPendidikan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function jurusanPendidikan()
    {
        return $this->belongsTo(JurusanPendidikan::class);
    }
    public function bioEmployee()
    {
        return $this->hasMany(BioEmployee::class);
    }

}
