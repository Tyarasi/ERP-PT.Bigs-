<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakTask extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'id',
        'id_stakeholder',
        'id_project',
    ];
}