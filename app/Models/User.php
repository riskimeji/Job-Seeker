<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded=[];
    public function lowongans(){
        return $this->hasManyThrough(Lamaran::class, Lowongan::class);
    }
    public function lamaran(){
        return $this->belongsTo(Lamaran::class);
    }
    public function bioEmployee(){
        return $this->hasOne(BioEmployee::class);
    }
    public function bioCompany(){
        return $this->hasOne(BioCompany::class);
    }
    public function getRouteKeyName(): string
    {
    return 'username';
    }


}
