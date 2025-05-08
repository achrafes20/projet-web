<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'membership_type', 'start_date', 
        'end_date', 'amount', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'start_date' => 'date',  // Add this line
        'end_date' => 'date',    // Add this line
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
}