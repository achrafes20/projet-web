<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'membership_id', 'amount', 
        'payment_date', 'payment_method', 'transaction_id', 'notes'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
    protected $casts = [
        'payment_date' => 'date',  
    ];
}