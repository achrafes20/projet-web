<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'specialization', 
        'hire_date', 'bio', 'certifications', 'profile_image'
    ];

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }
}