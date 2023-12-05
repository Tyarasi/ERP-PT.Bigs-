<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenawaran extends Model
{
    use HasFactory;
    protected $fillable = ['status_penawaran'];
    protected $table = 'status_penawarans';
  

    public function penawaran()
    {
        //return $this->hasMany('App\Penawaran', 'id_statuspenawaran');

        return $this->hasMany(StatusPenawaran::class, 'id_statuspenawaran', 'id');
    }
}