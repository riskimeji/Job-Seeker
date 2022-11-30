<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioCompany extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function province(){
        return $this->belongsTo('Laravolt\Indonesia\Models\Province');
    }
    public function city(){
        return $this->belongsTo('Laravolt\Indonesia\Models\City');
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    public function industry(){
        return $this->belongsTo(Industry::class);
    }
    public function hari_kerja(){
        return $this->belongsTo(HariKerja::class);
    }
    public function bioCompany()
{
    return $this->belongsTo(BioCompany::class);
}

}
