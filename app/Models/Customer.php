<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = 
    [
        'nama_cs', 'no_hp', 'email', 'alamat'
    ];
    
    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'id_cs', 'id');
    }

    public function penawaran()
    {
        //return $this->hasMany('App\Penawaran', 'id_statuspenawaran');

        return $this->hasMany(Penawaran::class, 'id_customer', 'id');
    }

}