<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [ 'id_customer','id_jenisproduk','tgl_invoice','biaya','nama_customer' ];

    public function customer()
    {
       //return $this->belongsTo('App\Models\Kontak', 'id_kontak');
       return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function jenisproduk()
    {
       //return $this->belongsTo('App\Models\JenisJabatan', 'id_jenisjabatan');

       //return $this->hasMany(JenisJabatan::class);

       return $this->belongsTo(JenisProduk::class, 'id_jenisproduk', 'id');
    }
}