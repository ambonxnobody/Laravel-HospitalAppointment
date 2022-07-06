<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }} · Appointment</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
</head>

<body>
    @include('sweetalert::alert')

    <header class="navbar navbar-danger sticky-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-center" href="/">
            Prefixcon Appointment
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" aria-label="Search" />
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="nav-link px-3 text-white btn btn-danger">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted text-uppercase">
                            <span>Dashboard</span>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        @can('admin')
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Schedule For Doctor</span>
                                <a class="link-secondary" href="/schedule/create" aria-label="Add a new report">
                                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('schedule*') ? 'active' : '' }}" href="/schedule">
                                        <span data-feather="calendar" class="align-text-bottom"></span>
                                        Schedules
                                    </a>
                                </li>
                            </ul>
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Application User</span>
                                <a class="link-secondary" href="/user/create" aria-label="Add a new report">
                                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="/user">
                                        <span data-feather="users" class="align-text-bottom"></span>
                                        User
                                    </a>
                                </li>
                            </ul>
                        @endcan
                        @can('doctor')
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Schedule</span>
                                <a class="link-secondary" href="/mySchedule/create" aria-label="Add a new report">
                                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('mySchedule*') ? 'active' : '' }}"
                                        href="/mySchedule">
                                        <span data-feather="calendar" class="align-text-bottom"></span>
                                        My Schedule
                                    </a>
                                </li>
                            </ul>
                        @endcan
                        @can('patient')
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Medical History</span>
                                <a class="link-secondary" href="/medicalHistory/create" aria-label="Add a new report">
                                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('medicalHistory*') ? 'active' : '' }}"
                                        href="/medicalHistory">
                                        <span data-feather="file-text" class="align-text-bottom"></span>
                                        My Medical History
                                    </a>
                                </li>
                            </ul>
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Appointment</span>
                                <a class="link-secondary" href="/" aria-label="Add a new report">
                                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('appointment*') ? 'active' : '' }}"
                                        href="/appointment">
                                        <span data-feather="file-text" class="align-text-bottom"></span>
                                        My Appointment
                                    </a>
                                </li>
                            </ul>
                        @endcan
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('Pages')
            </main>
            <div class="mb-5"></div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
