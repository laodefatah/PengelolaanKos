<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }
}
