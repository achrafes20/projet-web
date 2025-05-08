@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add Attendance Record</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('attendances.store') }}" method="POST">
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
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check In Time</label>
                        <input type="datetime-local" class="form-control" id="check_in" name="check_in" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection