<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'position', 
        'join_date', 'address', 'salary', 'photo', 'status'
    ];
    protected $casts = [
        'join_date' => 'date:Y-m-d', // or 'datetime' if it includes time
        'birth_date' => 'date:Y-m-d', // or 'datetime'
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
}