<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelasModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_main';
    public $timestamps = false;
    protected $primaryKey = 'id_kelas';
    protected $table = 'kelas';

 	 protected $fillable = [ 
        'id_kelas','nama_kelas','kompetensi_keahlian','created_at',
      ];


}
