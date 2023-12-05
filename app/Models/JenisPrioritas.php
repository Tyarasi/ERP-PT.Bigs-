<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrioritas extends Model
{
    use HasFactory;
    protected $table = 'jenis_prioritas';
    protected $fillable = ['jenis_prioritas'];

    public function penawaran()
    {
        //return $this->hasMany('App\Penawaran', 'id_statuspenawaran');

        return $this->hasMany(Penawaran::class, 'id_jenisprioritas');
    }
}