<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'join_date', 'birth_date', 
        'gender', 'address', 'emergency_contact', 'health_notes', 
        'profile_image', 'membership_id'
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}