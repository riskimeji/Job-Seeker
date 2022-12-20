<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lowongan(){
        return $this->belongsTo(Lowongan::class);
    }
    public function lamaran(){
        return $this->belongsTo(Lamaran::class);
    }
    // public function getRouteKeyName(): string
    // {
    // return 'slug';
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
