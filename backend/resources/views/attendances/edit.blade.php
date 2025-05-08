@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Attendance Record</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-select" id="member_id" name="member_id" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $attendance->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check In Time</label>
                        <input type="datetime-local" class="form-control" id="check_in" name="check_in" 
                               value="{{ date('Y-m-d\TH:i', strtotime($attendance->check_in)) }}" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check Out Time</label>
                <input type="datetime-local" class="form-control" id="check_out" name="check_out" 
                       value="{{ $attendance->check_out ? date('Y-m-d\TH:i', strtotime($attendance->check_out)) : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection