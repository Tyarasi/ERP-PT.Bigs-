<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJabatan extends Model
{
    use HasFactory;
    protected $table = 'jenis_jabatans';
    protected $primaryKey = 'id';
    protected $fillable = ['jenis_jabatan'];

    public function user() {

        return $this->hasMany(User::class, 'id_jenisjabatan', 'id');
      }
}