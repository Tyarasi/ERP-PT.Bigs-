<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;
    protected $table = 'penawarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_customer', 'jenisprioritas', 'id_jenisproduk','statuspenawaran', 'nama_penawaran','deal_value','tanggal'
    ];

    public function jenisproduk()
    {
       //return $this->belongsTo('App\Models\JenisProduk', 'id_jenisproduk');
       return $this->belongsTo(JenisProduk::class, 'id_jenisproduk', 'id');
    }

    public function jenisprioritas()
    {
       //return $this->belongsTo('App\Models\JenisPrioritas', 'id_jenisprioritas');
       return $this->belongsTo(JenisPrioritas::class, 'id_jenisprioritas', 'id');
    }

    public function statuspenawaran()
    {
       //return $this->belongsTo('App\Models\StatusPenawaran', 'id_statuspenawaran');
       return $this->belongsTo(StatusPenawaran::class, 'id_statuspenawaran', 'id');
    }

    public function customer()
    {
       //return $this->belongsTo('App\Models\Kontak', 'id_kontak');
       return $this->belongsTo(customer::class, 'id_customer', 'id');
    }
}