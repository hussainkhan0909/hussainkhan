<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin_end/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_end/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_end/assets/css/style.css') }}">

    <!-- EXTRA STYLE -->
    <style>
        body {
            background: #f1f5f9;
        }

        .sidebar {
            background: #0f172a;
        }

        .sidebar .nav .nav-link {
            color: #cbd5f5;
            border-radius: 8px;
            margin: 5px 10px;
            transition: 0.3s;
        }

        .sidebar .nav .nav-link:hover {
            background: #1e293b;
            color: #fff;
        }

        .sidebar .menu-title {
            font-weight: 600;
        }

        .navbar {
            background: #ffffff;
        }

        .navbar-profile p {
            font-weight: 600;
        }

        .content-wrapper {
            background: #f8fafc;
            border-radius: 15px;
            padding: 20px;
        }
    </style>

</head>

<body>

<div class="container-scroller">

    <!-- SIDEBAR -->
    <nav class="sidebar sidebar-offcanvas shadow-lg" id="sidebar">

        <div class="sidebar-brand-wrapper d-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{route('index')}}">
                <img src="{{ asset('admin_end/assets/images/logo.svg') }}" alt="logo" />
            </a>
        </div>

        <ul class="nav mt-4">

            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#doctorMenu">
                    <span class="menu-icon"><i class="mdi mdi-hospital"></i></span>
                    <span class="menu-title">Doctors Panel</span>
                    <i class="menu-arrow"></i>
                </a>

                <div class="collapse" id="doctorMenu">
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">
                                🏠 Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('add_doctors') }}">
                                ➕ Add Doctors
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view_doctors') }}">
                                👨‍⚕️ View Doctors
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view_appointment') }}">
                                📅 Appointments
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>

    </nav>


    <!-- MAIN CONTENT -->
    <div class="container-fluid page-body-wrapper">

        <!-- NAVBAR -->
        <nav class="navbar p-0 fixed-top d-flex flex-row shadow-sm">

            <div class="navbar-menu-wrapper flex-grow d-flex align-items-center justify-content-between px-3">

                <!-- TOGGLE -->
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <!-- MOBILE -->
                <button class="navbar-toggler d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>

                <!-- SEARCH -->
                <form class="d-none d-md-flex w-50">
                    <input type="text" class="form-control rounded-pill" placeholder="🔍 Search...">
                </form>

                <!-- USER -->
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown">

                            <div class="navbar-profile d-flex align-items-center gap-2">
                                <i class="mdi mdi-account-circle fs-4"></i>
                                <p class="mb-0">
                                    {{ Auth::user()->name ?? 'Admin' }}
                                </p>
                                <i class="mdi mdi-menu-down"></i>
                            </div>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow rounded">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">
                                    🚪 Logout
                                </button>
                            </form>

                        </div>

                    </li>

                </ul>

            </div>

        </nav>


        <!-- PAGE CONTENT -->
        <div class="main-panel">

            <div class="content-wrapper mt-4 shadow-sm">

                @yield('add_doctors')
                @yield('view_doctors')
                @yield('view_appointments')

            </div>

        </div>

    </div>

</div>

<!-- JS -->
<script src="{{ asset('admin_end/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin_end/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin_end/assets/js/misc.js') }}"></script>

</body>
</html>