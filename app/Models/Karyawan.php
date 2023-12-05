<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'id_jenisjabatan', 'nik_karyawan', 'nama_karyawan','no_hp', 'email','alamat','foto_karyawan'
    ];

    public function jenisjabatan()
    {
       //return $this->belongsTo('App\Models\JenisJabatan', 'id_jenisjabatan');

       //return $this->hasMany(JenisJabatan::class);

       return $this->belongsTo(JenisJabatan::class, 'id_jenisjabatan', 'id');
    }

    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'id_karyawan', 'id');
    }
}