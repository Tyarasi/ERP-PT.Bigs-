<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_jenisproduk',
        'id_karyawan',
        'id_cs',
        'tanggal_awal',
        'tanggal_akhir',
        'status',
    ];

    public function jenisproduk()
    {
       //return $this->belongsTo('App\Models\JenisProduk', 'id_jenisproduk');
       return $this->belongsTo(JenisProduk::class, 'id_jenisproduk', 'id');
    }

    public function karyawan()
    {
       //return $this->belongsTo('App\Models\JenisProduk', 'id_jenisproduk');
       return $this->belongsTo(JenisProduk::class, 'id_karyawan', 'id');
    }

    public function customer()
    {
       //return $this->belongsTo('App\Models\Kontak', 'id_kontak');
       return $this->belongsTo(customer::class, 'id_cs', 'id');
    }
}