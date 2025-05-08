<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'join_date', 'birth_date', 
        'gender', 'address', 'emergency_contact', 'photo', 'status'
    ];

    // Add this to automatically convert dates to Carbon instances
    protected $casts = [
        'join_date' => 'date:Y-m-d', // or 'datetime' if it includes time
        'birth_date' => 'date:Y-m-d', // or 'datetime'
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function workoutPlans()
    {
        return $this->hasMany(WorkoutPlan::class);
    }
}