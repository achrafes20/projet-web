@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Trainers</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('trainers.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Trainer
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
                            <th>Specialization</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Hire Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainers as $trainer)
                        <tr>
                            <td>{{ $trainer->id }}</td>
                            <td>
                                @if($trainer->profile_image)
                                    <img src="{{ asset('storage/' . $trainer->profile_image) }}" alt="{{ $trainer->name }}" class="rounded-circle me-2" width="30" height="30">
                                @endif
                                {{ $trainer->name }}
                            </td>
                            <td>{{ $trainer->specialization }}</td>
                            <td>{{ $trainer->email }}</td>
                            <td>{{ $trainer->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($trainer->hire_date)->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('trainers.show', $trainer->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this trainer?')">
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