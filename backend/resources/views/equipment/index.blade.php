@extends('layouts.app')

@section('title', 'Equipment')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Gym Equipment</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('equipment.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Equipment
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Serial Number</th>
                            <th>Purchase Date</th>
                            <th>Condition</th>
                            <th>Last Maintenance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipment as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->serial_number }}</td>
                         <td>{{ \Carbon\Carbon::parse($item->purchase_date)->format('M d, Y') }}</td>
                            <td>
                                @if($item->condition == 'good')
                                    <span class="badge bg-success">Good</span>
                                @elseif($item->condition == 'needs_maintenance')
                                    <span class="badge bg-warning">Needs Maintenance</span>
                                @else
                                    <span class="badge bg-danger">Needs Replacement</span>
                                @endif
                            </td>
                            <td>{{ $item->last_maintenance ? \Carbon\Carbon::parse($item->last_maintenance)->format('M d, Y') : 'Never' }}</td>
                            <td>
                                <a href="{{ route('equipment.show', $item->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this equipment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection