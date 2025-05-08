<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'check_in', 'check_out'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];
}