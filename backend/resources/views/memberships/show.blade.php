@extends('layouts.app')

@section('title', 'Membership Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Membership Plan: {{ $membership->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Memberships
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Plan Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $membership->name }}</p>
                    <p><strong>Price:</strong> ${{ number_format($membership->price, 2) }}</p>
                    <p><strong>Duration:</strong> {{ $membership->duration_days }} days</p>
                    <p><strong>Description:</strong></p>
                    <p>{{ $membership->description ?? 'No description available' }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this membership plan?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Members with this Plan ({{ $membership->members->count() }})</h5>
                </div>
                <div class="card-body">
                    @if($membership->members->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Join Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($membership->members as $member)
                                    <tr>
                                        <td>
                                            <a href="{{ route('members.show', $member->id) }}">{{ $member->name }}</a>
                                        </td>
                                        <td>{{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('M d, Y') : 'N/A' }}</td>
                                        <td>
                                            @php
                                                $activePayment = $member->payments()
                                                    ->where('status', 'paid')
                                                    ->where('due_date', '>', now())
                                                    ->exists();
                                            @endphp
                                            @if($activePayment)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-warning">Expired</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No members currently subscribed to this plan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection