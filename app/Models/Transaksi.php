<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamar_id',
        'penghuni_id',
        'jumlah_pembayaran',
        'status_pembayaran',
        'tanggal_transaksi',
    ];
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
    
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
//     public static function totalPendapatan()
//  {
//     return self::sum('jumlah_pembayaran');
//  }

//  public static function pendapatanBulanan($bulan, $tahun)
//  {
//      return self::whereMonth('tanggal_transaksi', $bulan)
//                 ->whereYear('tanggal_transaksi', $tahun)
//                 ->sum('jumlah_pembayaran');
// }
}
