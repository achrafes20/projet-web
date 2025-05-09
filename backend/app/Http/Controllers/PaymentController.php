<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['member', 'membership'])->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $members = Member::all();
        $memberships = Membership::all();
        return view('payments.create', compact('members', 'memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'membership_id' => 'required|exists:memberships,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'due_date' => 'required|date|after:payment_date',
            'payment_method' => 'required',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $members = Member::all();
        $memberships = Membership::all();
        return view('payments.edit', compact('payment', 'members', 'memberships'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'membership_id' => 'required|exists:memberships,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'due_date' => 'required|date|after:payment_date',
            'payment_method' => 'required',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}