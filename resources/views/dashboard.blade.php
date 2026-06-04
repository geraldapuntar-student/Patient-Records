<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7ff;
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 60px;
        }

        .navbar-top {
            background-color: #2980b9;
            height: 60px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .navbar-top .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .navbar-top .nav-toggle {
            display: none;
            background: none;
            border: 1px solid rgba(255,255,255,0.35);
            color: white;
            font-size: 18px;
            padding: 4px 9px;
            border-radius: 6px;
            cursor: pointer;
            margin-left: auto;
            line-height: 1;
        }

        .navbar-top .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
            justify-content: center;
        }

        .navbar-top .nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.15s;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .navbar-top .nav-links a:hover,
        .navbar-top .nav-links a.active {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .navbar-top .nav-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-top .nav-user {
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            text-decoration: none;
            padding: 5px 8px;
            border-radius: 6px;
            transition: all 0.15s;
        }

        .navbar-top .nav-user:hover {
            background: rgba(255,255,255,0.12);
            color: white;
        }

        .navbar-top .btn-logout {
            background: none;
            border: 1px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            transition: all 0.15s;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .navbar-top .btn-logout:hover {
            background: rgba(255,255,255,0.12);
            color: white;
        }

        .nav-drawer {
            display: none;
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
            background-color: #1a6fa0;
            z-index: 999;
            padding: 10px 16px 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            flex-direction: column;
            gap: 4px;
        }

        .nav-drawer.open {
            display: flex;
        }

        .nav-drawer a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 14px;
            padding: 9px 12px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.15s;
        }

        .nav-drawer a:hover,
        .nav-drawer a.active {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .nav-drawer .drawer-divider {
            border-top: 1px solid rgba(255,255,255,0.15);
            margin: 6px 0;
        }

        .nav-drawer .drawer-user {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255,255,255,0.75);
            font-size: 13px;
            padding: 8px 12px 4px;
            text-decoration: none;
            border-radius: 7px;
            transition: background 0.15s;
        }

        .nav-drawer .drawer-user:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .nav-drawer .drawer-logout {
            background: none;
            border: 1px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            padding: 8px 12px;
            border-radius: 7px;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            transition: background 0.15s;
        }

        .nav-drawer .drawer-logout:hover {
            background: rgba(255,255,255,0.1);
        }

        .main-content {
            padding: 24px;
        }

        .card-stat {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid #3498db;
        }

        .card-stat .icon {
            width: 46px;
            height: 46px;
            min-width: 46px;
            background-color: #d6eaf8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-stat .icon i {
            font-size: 20px;
            color: #2980b9;
        }

        .card-stat .label {
            font-size: 12px;
        }

        .card-stat .value {
            font-size: 26px;
            font-weight: 700;
            color: #2980b9;
            line-height: 1.2;
        }

        .chart-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* ── Responsive breakpoints ── */
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }

            /* Hide desktop nav, show toggle */
            .navbar-top .nav-links,
            .navbar-top .nav-right {
                display: none;
            }

            .navbar-top .nav-toggle {
                display: block;
            }

            .main-content {
                padding: 16px 12px;
            }

            .card-stat .value {
                font-size: 22px;
            }

            .card-stat .label {
                font-size: 11px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .navbar-top .nav-links a {
                font-size: 13px;
                padding: 6px 8px;
            }

            .navbar-top .nav-user span.name-text {
                display: none;
            }

            .main-content {
                padding: 20px 16px;
            }
        }
    </style>
</head>
<body>
<!-- nav -->
    <div class="navbar-top">
        <a class="brand" href="{{ route('dashboard') }}">
            <i class="bi bi-heart-pulse-fill" style="font-size: 25px;"></i>
            <span>CareCloud</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('patients.index') }}">
                <i class="bi bi-file-medical"></i> Patients
            </a>
            <a href="{{ route('users.index') }}">
                <i class="bi bi-people"></i> Users
            </a>
            <a href="{{ route('profile.index') }}">
                <i class="bi bi-person-circle"></i> Profile
            </a>
        </div>

        <div class="nav-right">
            <a href="{{ route('profile.index') }}" class="nav-user">
                <img src="{{ Auth::user()->profile_picture ? asset('uploads/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                    alt="Profile"
                    style="width:30px; height:30px; border-radius:50%; object-fit:cover; border: 2px solid rgba(255,255,255,0.5);">
                <span class="name-text">{{ Auth::user()->name }}</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>

        <!-- Mobile hamburger -->
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <i class="bi bi-list" id="toggleIcon"></i>
        </button>
    </div>
 
    <div class="nav-drawer" id="navDrawer">
        <a href="{{ route('dashboard') }}" class="active">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('patients.index') }}">
            <i class="bi bi-file-medical"></i> Patients
        </a>
        <a href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> Users
        </a>
        <a href="{{ route('profile.index') }}">
            <i class="bi bi-person-circle"></i> Profile
        </a>
        <div class="drawer-divider"></div>
        <a href="{{ route('profile.index') }}" class="drawer-user">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                alt="Profile"
                style="width:28px; height:28px; border-radius:50%; object-fit:cover; border: 2px solid rgba(255,255,255,0.4);">
            {{ Auth::user()->name }}
        </a>
        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="drawer-logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!--  Main Content  -->
    <div class="main-content">

        <!-- Success Toast -->
        @if(session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">{{ session('success') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
        @endif

        <!-- Page Title -->
        <h5 class="mb-4"><i class="bi bi-speedometer2 me-2"></i>Dashboard</h5>

        <!-- Stat Cards -->
        <div class="row mb-4 g-3">

            <!-- Total Users -->
            <div class="col-6 col-md-3">
                <div class="card card-stat p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon"><i class="bi bi-people"></i></div>
                        <div>
                            <div class="text-muted label">Total Users</div>
                            <div class="value">{{ $totalUsers }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Patients -->
            <div class="col-6 col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #2ecc71;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color:#d5f5e3;">
                            <i class="bi bi-file-medical" style="color:#27ae60;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Total Patients</div>
                            <div class="value" style="color:#27ae60;">{{ $totalPatients }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Patients -->
            <div class="col-6 col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #f39c12;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color:#fef9e7;">
                            <i class="bi bi-clipboard2-pulse" style="color:#f39c12;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Active Patients</div>
                            <div class="value" style="color:#f39c12;">{{ $activePatients }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Discharged -->
            <div class="col-6 col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #e57373;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color:#fdecea;">
                            <i class="bi bi-clipboard-check" style="color:#e57373;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Discharged</div>
                            <div class="value" style="color:#e57373;">{{ $dischargedPatients }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Charts Row -->
        <div class="row g-3">

            <!-- Bar Chart -->
            <div class="col-12 col-md-8">
                <div class="card chart-card p-4">
                    <h6 class="mb-3"><i class="bi bi-bar-chart me-2"></i>Patient Overview</h6>
                    <canvas id="patientChart" height="120"></canvas>
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="col-12 col-md-4">
                <div class="card chart-card p-4">
                    <h6 class="mb-3"><i class="bi bi-file-medical me-2"></i>Patient Status</h6>
                    <canvas id="statusChart" height="180"></canvas>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // toast
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            new bootstrap.Toast(toastEl, { delay: 3000 }).show();
        }

        // Mobile nav drawer toggle
        const navToggle = document.getElementById('navToggle');
        const navDrawer = document.getElementById('navDrawer');
        const toggleIcon = document.getElementById('toggleIcon');

        navToggle.addEventListener('click', function () {
            const isOpen = navDrawer.classList.toggle('open');
            toggleIcon.className = isOpen ? 'bi bi-x-lg' : 'bi bi-list';
        });

       
        navDrawer.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navDrawer.classList.remove('open');
                toggleIcon.className = 'bi bi-list';
            });
        });

        //  Bar Chart
        new Chart(document.getElementById('patientChart'), {
            type: 'bar',
            data: {
                labels: ['Total Patients', 'Active', 'Discharged'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $totalPatients }}, {{ $activePatients }}, {{ $dischargedPatients }}],
                    backgroundColor: ['#3498db', '#2ecc71', '#e57373'],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });

        // Doughnut Chart
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Discharged', 'Critical'],
                datasets: [{
                    data: [{{ $activePatients }}, {{ $dischargedPatients }}, {{ $criticalPatients }}],
                    backgroundColor: ['#f39c12', '#e57373', '#7dd0e2'],
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>

</body>
</html>