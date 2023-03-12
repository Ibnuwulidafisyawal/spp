<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_main';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'siswa';

 	 protected $fillable = [ 
        'id','nisn','nis','nama','id_kelas','alamat','no_telp','id_spp','created_at'
      ];
}
