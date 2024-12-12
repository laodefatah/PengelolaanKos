<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penghuni extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['nama','no_whatsapp','tanggal_masuk'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
