<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukkan extends Model
{
    use HasFactory;
    protected $fillable = ['id_jenisproduk','tgl_pemasukan','biaya' ];

    public function jenisproduk()
    {
       //return $this->belongsTo('App\Models\JenisJabatan', 'id_jenisjabatan');

       //return $this->hasMany(JenisJabatan::class);

       return $this->belongsTo(JenisProduk::class, 'id_jenisproduk', 'id');
    }
}