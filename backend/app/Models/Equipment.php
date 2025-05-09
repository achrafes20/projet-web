<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'serial_number', 'purchase_date', 
        'price', 'condition', 'last_maintenance', 'notes'
    ];
}