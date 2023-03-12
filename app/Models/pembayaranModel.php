<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaranModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_main';
    public $timestamps = false;
    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayaran';

 	 protected $fillable = [ 
        'id_pembayaran','id_petugas','nisn','tgl_bayar','bulan_bayar','tahun_bayar','id_spp','jumlah_bayar','id_siswa'
      ];
}
