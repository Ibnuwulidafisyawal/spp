<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class petugasModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'pgsql_main';
    public $timestamps = false;
    protected $primaryKey = 'id_petugas';
    protected $table = 'petugas';

 	 protected $fillable = [ 
        'id_petugas','username','password','nama_petugas','level_user','id_siswa'
      ];
}
