<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_produk'];
    protected $table = 'jenis_produks';
  

    public function penawaran()
    {
        //return $this->hasMany('App\Penawaran', 'id_jenisproduk');

        return $this->hasMany(JenisProduk::class, 'id_jenisproduk', 'id');
    }

    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'id_jenisproduk', 'id');
    }
}