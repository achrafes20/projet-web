@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Membership</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-select" id="member_id" name="member_id" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $membership->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="membership_type" class="form-label">Membership Type</label>
                        <select class="form-select" id="membership_type" name="membership_type" required>
                            <option value="basic" {{ $membership->membership_type == 'basic' ? 'selected' : '' }}>Basic</option>
                            <option value="premium" {{ $membership->membership_type == 'premium' ? 'selected' : '' }}>Premium</option>
                            <option value="gold" {{ $membership->membership_type == 'gold' ? 'selected' : '' }}>Gold</option>
                            <option value="platinum" {{ $membership->membership_type == 'platinum' ? 'selected' : '' }}>Platinum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $membership->start_date }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $membership->end_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $membership->amount }}" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status" {{ $membership->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection