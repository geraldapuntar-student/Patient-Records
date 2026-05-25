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

        /* ── Navbar ── */
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
            padding: 0 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .navbar-top .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            margin-right: 28px;
            white-space: nowrap;
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
            padding: 6px 13px;
            border-radius: 6px;
            transition: all 0.15s;
            display: flex;
            align-items: center;
            gap: 6px;
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
        }

        .navbar-top .btn-logout {
            background: none;
            border: 1px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            padding: 5px 13px;
            border-radius: 6px;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            transition: all 0.15s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .navbar-top .btn-logout:hover {
            background: rgba(255,255,255,0.12);
            color: white;
        }

        /* ── Main Content ── */
        .main-content {
            padding: 30px;
        }

        /* ── Stat Cards ── */
        .card-stat {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid #3498db;
        }

        .card-stat .icon {
            width: 50px;
            height: 50px;
            background-color: #d6eaf8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-stat .icon i {
            font-size: 22px;
            color: #2980b9;
        }

        .card-stat .label {
            font-size: 14px;
        }

        .card-stat .value {
            font-size: 29px;
            font-weight: 700;
            color: #2980b9;
        }

        /* ── Chart Card ── */
        .chart-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .toast { font-size: 14px; }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <div class="navbar-top">
        <a class="brand" href="{{ route('dashboard') }}">
            <i class="bi bi-heart-pulse-fill"></i> Patient Records
        </a>

        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="#">
                <i class="bi bi-people"></i> Users
            </a>
            <a href="#">
                <i class="bi bi-file-medical"></i> Patients
            </a>
            <a href="#">
                <i class="bi bi-person-circle"></i> Profile
            </a>
        </div>

        <div class="nav-right">
            <span class="nav-user">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main-content">

        {{-- Success Toast --}}
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

        {{-- Stat Cards --}}
        <div class="row mb-4">
            <div class="col-md-3">
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
            <div class="col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #2ecc71;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color: #d5f5e3;">
                            <i class="bi bi-file-medical" style="color: #27ae60;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Total Patients</div>
                            <div class="value" style="color: #27ae60;">{{ $totalPatients }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #f39c12;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color: #fef9e7;">
                            <i class="bi bi-clipboard2-pulse" style="color: #f39c12;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Active Records</div>
                            <div class="value" style="color: #f39c12;">{{ $activeRecords ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat p-3" style="border-left-color: #e74c3c;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon" style="background-color: #fadbd8;">
                            <i class="bi bi-calendar-check" style="color: #e74c3c;"></i>
                        </div>
                        <div>
                            <div class="text-muted label">Today's Visits</div>
                            <div class="value" style="color: #e74c3c;">{{ $todayVisits ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chart --}}
        <div class="card chart-card p-4">
            <h6 class="mb-3">Overview</h6>
            <canvas id="myChart" height="100"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }

        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Users', 'Patients', 'Active Records', "Today's Visits"],
                datasets: [{
                    label: 'Total Count',
                    data: [
                        {{ $totalUsers }},
                        {{ $totalPatients }},
                        {{ $activeRecords ?? 0 }},
                        {{ $todayVisits ?? 0 }}
                    ],
                    backgroundColor: [
                        '#3498db',
                        '#2ecc71',
                        '#f39c12',
                        '#e74c3c'
                    ],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

</body>
</html>