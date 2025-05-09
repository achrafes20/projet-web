<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            display: flex;
            flex-direction: column;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 0.5rem 1rem;
        }
        .sidebar .nav-link:hover {
            color: rgba(255, 255, 255, 1);
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link.active {
            color: white;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .sidebar .nav-item {
            width: 100%;
        }
        .logout-btn {
            color: rgba(255, 255, 255, 0.75);
            background: none;
            border: none;
            text-align: left;
            width: 100%;
            padding: 0.5rem 1rem;
        }
        .logout-btn:hover {
            color: rgba(255, 255, 255, 1);
            background-color: rgba(255, 99, 71, 0.2);
        }
        .nav-flex {
            flex-grow: 1;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3">
                    <h4 class="text-white">Gym Management</h4>
                </div>
                <ul class="nav flex-column nav-flex">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('members*') ? 'active' : '' }}" href="{{ route('members.index') }}">
                            <i class="bi bi-people me-2"></i>Members
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('memberships*') ? 'active' : '' }}" href="{{ route('memberships.index') }}">
                            <i class="bi bi-card-list me-2"></i>Memberships
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('trainers*') ? 'active' : '' }}" href="{{ route('trainers.index') }}">
                            <i class="bi bi-person-badge me-2"></i>Trainers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('workouts*') ? 'active' : '' }}" href="{{ route('workouts.index') }}">
                            <i class="bi bi-calendar-event me-2"></i>Workouts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('payments*') ? 'active' : '' }}" href="{{ route('payments.index') }}">
                            <i class="bi bi-cash-coin me-2"></i>Payments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('equipment*') ? 'active' : '' }}" href="{{ route('equipment.index') }}">
                            <i class="bi bi-tools me-2"></i>Equipment
                        </a>
                    </li>
                </ul>
                
                <!-- Logout Button -->
                <div class="p-3 mt-auto">
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-left me-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 ms-auto p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>