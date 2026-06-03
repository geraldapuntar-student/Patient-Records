<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7ff;
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 60px;
        }

        /* navbar */
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

        .nav-drawer.open { display: flex; }

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
            padding: 8px 12px;
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

        /* main content */
        .main-content {
            padding: 24px;
        }

        .card-table {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            background: #fff;
        }

        .card-table table { margin: 0; }

        .card-table thead th {
            background-color: #2980b9;
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            border: none;
            padding: 12px 14px;
            white-space: nowrap;
        }

        .card-table tbody tr {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-table tbody tr:last-child { border-bottom: none; }
        .card-table tbody tr:hover { background-color: #f5f9fd; }

        .card-table tbody td {
            color: #333;
            font-size: 13px;
            padding: 10px 14px;
            vertical-align: middle;
            border: none;
        }

        .table-responsive-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .empty-state {
            padding: 50px 20px;
            text-align: center;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 2rem;
            color: #bbb;
            display: block;
            margin-bottom: 8px;
        }

        /* ── Modal styling ── */
        .modal-header {
            background-color: #2980b9;
            color: #fff;
            border-bottom: none;
        }

        .modal-header .modal-title {
            color: #fff;
            font-size: 15px;
            font-weight: 600;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .modal-header .btn-close:hover { opacity: 1; }

        .modal-footer {
            background-color: #f0f7ff;
            border-top: 1px solid #d0e8f5;
        }

        
        @media (max-width: 768px) {
            .navbar-top .nav-links,
            .navbar-top .nav-right { display: none; }

            .navbar-top .nav-toggle { display: block; }

            .main-content { padding: 16px 12px; }

            .page-header {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 10px;
            }

            .btn-action-label { display: none; }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .navbar-top .nav-links a {
                font-size: 13px;
                padding: 6px 8px;
            }

            .main-content { padding: 20px 16px; }
        }
    </style>
</head>
<body>

    <!-- navbar -->
    <div class="navbar-top">
        <a class="brand" href="{{ route('dashboard') }}">
            <i class="bi bi-heart-pulse-fill" style="font-size: 25px;"></i>
            <span>CareCloud</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('patients.index') }}" class="active">
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
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                    alt="Profile"
                    style="width:30px; height:30px; border-radius:50%; object-fit:cover; border: 2px solid rgba(255,255,255,0.5);">
                {{ Auth::user()->name }}
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <i class="bi bi-list" id="toggleIcon"></i>
        </button>
    </div>

    <div class="nav-drawer" id="navDrawer">
        <a href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('patients.index') }}" class="active">
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

   <!-- main content -->
    <div class="main-content">

       <!-- success toast -->
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

        <!-- error toast -->
        @if($errors->any())
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">{{ $errors->first() }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
        @endif

    
        <div class="d-flex justify-content-between align-items-center mb-4 page-header">
            <h5 class="mb-0"><i class="bi bi-file-medical me-2"></i>Patient Records</h5>
            <button class="btn  btn-sm" data-bs-toggle="modal" data-bs-target="#addPatientModal" style="background-color:#2980b9;color:white;">
                <i class="bi bi-plus-lg me-1"></i>
                <span class="d-none d-sm-inline btn-action-label" style="display:inline!important"></span>
                Add Patient
            </button>
        </div>

        <!-- table -->
        <div class="card card-table">
            <div class="card-body p-0">
                <div class="table-responsive-wrapper">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Diagnosis</th>
                                <th>Doctor</th>
                                <th>Admission Date</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patients as $index => $patient)
                            <tr>
                                <td>{{ $patient->patient_no }}</td>
                                <td style="white-space:nowrap;">{{ $patient->patient_name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->diagnosis }}</td>
                                <td style="white-space:nowrap;">{{ $patient->doctor_assigned }}</td>
                                <td style="white-space:nowrap;">{{ $patient->admission_date->format('M d, Y') }}</td>
                                <td>
                                    @if($patient->status === 'Active')
                                        <span class="badge bg-warning text-dark">Active</span>
                                    @elseif($patient->status === 'Discharged')
                                        <span class="badge bg-success">Discharged</span>
                                    @else
                                        <span class="badge bg-danger">Critical</span>
                                    @endif
                                </td>
                                <td class="text-center" style="white-space:nowrap;">
                                    <button class="btn btn-sm btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editPatientModal{{ $patient->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $patient->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <i class="bi bi-file-medical"></i>
                                        <p class="mb-0">No Patient Records Found</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- content -->

    <div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPatientModalLabel">
                        <i class="bi bi-plus-lg me-2"></i>Add Patient
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('patients.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Patient Name</label>
                                <input type="text" name="patient_name" class="form-control"
                                    placeholder="Full Name" required>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control"
                                    placeholder="Age" min="0" max="150" required>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Doctor Assigned</label>
                                <input type="text" name="doctor_assigned" class="form-control"
                                    placeholder="Doctor Name" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Diagnosis</label>
                                <input type="text" name="diagnosis" class="form-control"
                                    placeholder="Diagnosis" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="" disabled selected>Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Discharged">Discharged</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Admission Date</label>
                                <input type="date" name="admission_date" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="2"
                                    placeholder="Additional notes..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-plus-lg me-1"></i> Add Patient
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
    @foreach($patients as $patient)

    <!-- edit -->
    <div class="modal fade" id="editPatientModal{{ $patient->id }}" tabindex="-1"
         aria-labelledby="editLabel{{ $patient->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel{{ $patient->id }}">
                        <i class="bi bi-pencil me-2"></i>Edit Patient
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Patient Name</label>
                                <input type="text" name="patient_name" class="form-control"
                                    value="{{ $patient->patient_name }}" required>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control"
                                    value="{{ $patient->age }}" min="0" max="150" required>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male"   {{ $patient->gender === 'Male'   ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $patient->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Doctor Assigned</label>
                                <input type="text" name="doctor_assigned" class="form-control"
                                    value="{{ $patient->doctor_assigned }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Diagnosis</label>
                                <input type="text" name="diagnosis" class="form-control"
                                    value="{{ $patient->diagnosis }}" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="Active"     {{ $patient->status === 'Active'     ? 'selected' : '' }}>Active</option>
                                    <option value="Discharged" {{ $patient->status === 'Discharged' ? 'selected' : '' }}>Discharged</option>
                                    <option value="Critical"   {{ $patient->status === 'Critical'   ? 'selected' : '' }}>Critical</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Admission Date</label>
                                <input type="date" name="admission_date" class="form-control"
                                    value="{{ $patient->admission_date->format('Y-m-d') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="2">{{ $patient->notes }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-check-lg me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <!-- delete modal -->
    <div class="modal fade" id="deleteModal{{ $patient->id }}" tabindex="-1"
         aria-labelledby="deleteLabel{{ $patient->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel{{ $patient->id }}">
                        <i class="bi bi-trash me-2"></i>Delete Patient
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong>{{ $patient->patient_name }}</strong>?
                    This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toasts
        var successToastEl = document.getElementById('successToast');
        if (successToastEl) new bootstrap.Toast(successToastEl, { delay: 3000 }).show();

        var errorToastEl = document.getElementById('errorToast');
        if (errorToastEl) new bootstrap.Toast(errorToastEl, { delay: 4000 }).show();

        //  Mobile nav drawer
        const navToggle = document.getElementById('navToggle');
        const navDrawer = document.getElementById('navDrawer');
        const toggleIcon = document.getElementById('toggleIcon');

        navToggle.addEventListener('click', function () {
            const isOpen = navDrawer.classList.toggle('open');
            toggleIcon.className = isOpen ? 'bi bi-x-lg' : 'bi bi-list';
        });
    </script>

</body>
</html>