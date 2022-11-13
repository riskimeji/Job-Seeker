<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\BioEmployee as Authenticatable;
use App\Models\HasOne;

class BioEmployee extends Model
{
    use HasFactory;
    protected $guarded=[];

public function user(){
    return $this->hasOne(User::class);
}
public function category(){
    return $this->belongsTo(Category::class);
}
public function jurusanPendidikan(){
    return $this->belongsTo(JurusanPendidikan::class);
}
public function province(){
    return $this->belongsTo('Laravolt\Indonesia\Models\Province');
}
public function city(){
    return $this->belongsTo('Laravolt\Indonesia\Models\City');
}
public function village(){
    return $this->belongsTo('Laravolt\Indonesia\Models\Village');
}
public function district(){
    return $this->belongsTo('Laravolt\Indonesia\Models\District');
}
public function bioEmployee()
{
    return $this->belongsTo(BioEmployee::class);
}

}
