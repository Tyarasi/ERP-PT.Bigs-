<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_status'];
   
    public function transaksi()
    {
        //return $this->hasMany('App\Penawaran', 'id_statuspenawaran');

        return $this->hasMany(Transaksi::class, 'id_statustransaksi');
    }
}