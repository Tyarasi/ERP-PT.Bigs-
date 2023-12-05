<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = [
        'nama_task',
        'type',
        'for',
        'priority',
        'task',
        'start_date',
        'end_date',
        'id_stakeholder',
        'id_modul',
        'status',
        'created_at'
    ];

}