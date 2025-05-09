<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Workout;
use App\Models\Equipment;

class HomeController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();
        $totalPayments = Payment::sum('amount');
        $upcomingWorkouts = Workout::where('date', '>=', now())
                                ->orderBy('date')
                                ->limit(5)
                                ->get();
        $equipment = Equipment::where('condition', '!=', 'good')
                            ->limit(5)
                            ->get();

        return view('dashboard', compact('totalMembers', 'totalPayments', 'upcomingWorkouts', 'equipment'));
    }
}