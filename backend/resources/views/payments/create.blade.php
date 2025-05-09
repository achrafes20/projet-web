@extends('layouts.app')

@section('title', 'Record Payment')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Record New Payment</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Payments
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Member</label>
                            <select class="form-select" id="member_id" name="member_id" required>
                                <option value="">Select Member</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->membership->name }})</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="membership_id" class="form-label">Membership</label>
                            <select class="form-select" id="membership_id" name="membership_id" required>
                                <option value="">Select Membership</option>
                                @foreach($memberships as $membership)
                                    <option value="{{ $membership->id }}">{{ $membership->name }} (${{ $membership->price }})</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-select" id="payment_method" name="payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="debit_card">Debit Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Record Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('member_id').addEventListener('change', function() {
        const memberId = this.value;
        if (memberId) {
            fetch(`/api/members/${memberId}/membership`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('membership_id').value = data.membership_id;
                    document.getElementById('amount').value = data.price;
                    
                    // Calculate due date (payment date + duration days)
                    const paymentDate = new Date(document.getElementById('payment_date').value);
                    if (!isNaN(paymentDate.getTime())) {
                        const dueDate = new Date(paymentDate);
                        dueDate.setDate(dueDate.getDate() + parseInt(data.duration_days));
                        document.getElementById('due_date').value = dueDate.toISOString().split('T')[0];
                    }
                });
        }
    });
    
    document.getElementById('payment_date').addEventListener('change', function() {
        const memberId = document.getElementById('member_id').value;
        if (memberId) {
            fetch(`/api/members/${memberId}/membership`)
                .then(response => response.json())
                .then(data => {
                    const paymentDate = new Date(this.value);
                    if (!isNaN(paymentDate.getTime())) {
                        const dueDate = new Date(paymentDate);
                        dueDate.setDate(dueDate.getDate() + parseInt(data.duration_days));
                        document.getElementById('due_date').value = dueDate.toISOString().split('T')[0];
                    }
                });
        }
    });
</script>
@endsection