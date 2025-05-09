<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'trainer_id', 'date', 
        'start_time', 'end_time', 'notes', 'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}