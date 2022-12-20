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
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lowongan(){
        return $this->belongsTo(Lowongan::class);
    }
    public function lamaran(){
        return $this->belongsTo(Lamaran::class);
    }


}
