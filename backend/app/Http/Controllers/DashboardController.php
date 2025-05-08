<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Attendance;
use App\Models\Payment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();
        $activeMembers = Member::where('status', true)->count();
        
        $today = Carbon::today();
        $todayAttendances = Attendance::whereDate('check_in', $today)->count();
        
        $monthlyRevenue = Payment::whereMonth('payment_date', now()->month)
                                ->sum('amount');
        
        $recentMembers = Member::orderBy('created_at', 'desc')->take(5)->get();
        $recentPayments = Payment::with('member')->orderBy('payment_date', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalMembers', 
            'activeMembers', 
            'todayAttendances', 
            'monthlyRevenue',
            'recentMembers',
            'recentPayments'
        ));
    }
}