<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kamar',
        'tipe_kamar',
        'harga_per_bulan',
        'status',
    ];

    // public function pemilik()
    // {
    //     return $this->belongsTo(Pemilik::class);
    // }

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
// public static function kamarTerisi()
// {
//     return self::whereHas('penghuni', function ($query) {
//         $query->whereNull('tanggal_keluar');
//     })->count();
// }

// public static function kamarKosong()
// {
//     return self::doesntHave('penghuni')->count();
// }
}
