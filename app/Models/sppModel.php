<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sppModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_main';
    public $timestamps = false;
    protected $primaryKey = 'id_spp';
    protected $table = 'spp';

 	 protected $fillable = [ 
        'id_spp','tahun','nominal','created_at'
      ];
}
