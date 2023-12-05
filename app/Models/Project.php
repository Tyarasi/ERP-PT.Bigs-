<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "projects";

    protected $fillable = [
        'nama_project',
        'type',
        'deskripsi',
        'user_id',
        'created_at'
    ];

    public function relationToModul(){
        return $this->hasOne(Modul::class);
    }

    public function relationToProject(){
        return $this->belongsTo(StakeHolder::class);
    }
}