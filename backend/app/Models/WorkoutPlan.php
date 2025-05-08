<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'title', 'description', 
        'start_date', 'end_date', 'goal', 'exercises'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    protected $casts = [
        'start_date' => 'date',  
        'end_date' => 'date',   
    ];
}