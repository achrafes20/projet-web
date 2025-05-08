@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add Payment Record</h5>
    </div>
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
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="membership_id" class="form-label">Membership</label>
                        <select class="form-select" id="membership_id" name="membership_id" required>
                            <option value="">Select Membership</option>
                            @foreach($memberships as $membership)
                                <option value="{{ $membership->id }}">{{ $membership->membership_type }} ({{ $membership->member->name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="cash">Cash</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="online">Online Payment</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">Transaction ID (if any)</label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('member_id').addEventListener('change', function() {
        const memberId = this.value;
        const membershipSelect = document.getElementById('membership_id');
        
        // Clear existing options except the first one
        while (membershipSelect.options.length > 1) {
            membershipSelect.remove(1);
        }
        
        if (memberId) {
            // Fetch memberships for the selected member
            fetch(`/api/members/${memberId}/memberships`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(membership => {
                        const option = document.createElement('option');
                        option.value = membership.id;
                        option.textContent = `${membership.membership_type} (${membership.start_date} to ${membership.end_date})`;
                        membershipSelect.appendChild(option);
                    });
                });
        }
    });
</script>
@endsection
@endsection