<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lamaran(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function jurusanPendidikan(){
        return $this->belongsTo(JurusanPendidikan::class);
    }
    public function jenjangPendidikan(){
        return $this->belongsTo(JenjangPendidikan::class);
    }
    public function jenjangKarir(){
        return $this->belongsTo(JenjangKarir::class);
    }
    public function minimalPengalaman(){
        return $this->belongsTo(MinimalPengalaman::class);
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
    public function bioCompany(){
        return $this->belongsTo(BioCompany::class);
    }
    public function getRouteKeyName(): string
    {
    return 'slug';
    }

}
