<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Member;

Route::get('/members/{member}/membership', function (Member $member) {
    return response()->json([
        'membership_id' => $member->membership_id,
        'price' => $member->membership->price,
        'duration_days' => $member->membership->duration_days
    ]);
});