<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBank extends Model
{
    use HasFactory;
    protected $fillable = ['nama_bank'];

    public function rekeningbank()
    {
        //return $this->hasMany('App\Penawaran', 'id_jenisproduk');

        return $this->hasMany(RekeningBank::class, 'id_namabank', 'id');
    }
}