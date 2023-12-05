<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    use HasFactory;
    protected $fillable = ['id_namabank','nomor_rekening','nama_pemilik' ];

    public function jenisbank()
    {
       //return $this->belongsTo('App\Models\JenisJabatan', 'id_jenisjabatan');

       //return $this->hasMany(JenisJabatan::class);

       return $this->belongsTo(JenisBank::class, 'id_namabank', 'id');
    }
}