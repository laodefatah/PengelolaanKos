<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $fillable = [];

    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }
}
