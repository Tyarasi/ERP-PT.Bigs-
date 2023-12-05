<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakeHolder extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_pegawai',
    ];

    public function relationToModul(){
        return $this->hasOne(Project::class);
    }
}