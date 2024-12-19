<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penghuni extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'no_whatsapp', 'tanggal_masuk', 'tanggal_keluar'];

    
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
//     public static function penghuniAktif()
// {
//     return self::whereNull('tanggal_keluar')->count();
// }

// public static function penghuniKeluar()
// {
//     return self::whereNotNull('tanggal_keluar')->count();
// }
}
