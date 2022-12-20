<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinimalPengalaman extends Model
{
    use HasFactory;
    protected $guarded=['minimal_pengalamen'];
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

}
