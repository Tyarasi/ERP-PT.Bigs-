<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
    'id_jenisproduk','status_transaksi','tgl_bayar','total_bayar'
    ];

    public function jenisproduk()
    {
       //return $this->belongsTo('App\Models\JenisProduk', 'id_jenisproduk');
       return $this->belongsTo(JenisProduk::class, 'id_jenisproduk', 'id');
    }

}