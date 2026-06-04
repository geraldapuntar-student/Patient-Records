<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7ff;
            padding-top: 72px;
            padding-bottom: 32px;
        }

        /*  navbar  */
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

        .navbar-brand-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .navbar-nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
            justify-content: center;
        }

        .navbar-nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .navbar-nav-links a.active {
            color: white;
            background: rgba(255,255,255,0.15);
        }

        .navbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-user {
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .navbar-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.5);
        }

        .logout-btn {
            background: none;
            border: 1px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .nav-toggle {
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

        /* Cards */
        .profile-card {
            border: 2px solid #2980b9;
            border-radius: 15px;
        }

        .profile-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 2px solid #2980b9;
            object-fit: cover;
        }

        @media (max-width: 767.98px) {
            .navbar-nav-links,
            .navbar-right { display: none; }

            .nav-toggle { display: block; }

            .profile-avatar {
                width: 110px;
                height: 110px;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .navbar-nav-links a {
                font-size: 13px;
                padding: 6px 8px;
            }

            .navbar-user .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="navbar-top">
        <a href="{{ route('dashboard') }}" class="navbar-brand-link me-2">
            <i class="bi bi-heart-pulse-fill" style="font-size: 25px;"></i>
            <span>CareCloud</span>
        </a>

        <div class="navbar-nav-links">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span class="nav-label">Dashboard</span>
            </a>
            <a href="{{ route('patients.index') }}">
                <i class="bi bi-file-medical"></i>
                <span class="nav-label">Patients</span>
            </a>
            <a href="{{ route('users.index') }}">
                <i class="bi bi-people"></i>
                <span class="nav-label">Users</span>
            </a>
            <a href="{{ route('profile.index') }}" class="active">
                <i class="bi bi-person-circle"></i>
                <span class="nav-label">Profile</span>
            </a>
        </div>

        <div class="navbar-right">
            <a href="{{ route('profile.index') }}" class="navbar-user" style="text-decoration:none;">
             
                <img src="{{ Auth::user()->profile_picture ? asset('uploads/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                    class="navbar-avatar" alt="avatar">
                <span class="user-name">{{ Auth::user()->name }}</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="d-none d-md-inline">Logout</span>
                </button>
            </form>
        </div>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <i class="bi bi-list" id="toggleIcon"></i>
        </button>
    </div>

    <!-- mobile drawer -->
    <div class="nav-drawer" id="navDrawer">
        <a href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('patients.index') }}">
            <i class="bi bi-file-medical"></i> Patients
        </a>
        <a href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> Users
        </a>
        <a href="{{ route('profile.index') }}" class="active">
            <i class="bi bi-person-circle"></i> Profile
        </a>
        <div class="drawer-divider"></div>
        <div class="drawer-user">
            
            <img src="{{ Auth::user()->profile_picture ? asset('uploads/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                alt="Profile"
                style="width:28px; height:28px; border-radius:50%; object-fit:cover; border: 2px solid rgba(255,255,255,0.4);">
            
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="drawer-logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!-- content -->
    <div class="container-fluid px-3 px-md-4 mt-2">

        <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div class="row g-3">

                {{-- Profile Picture Card --}}
                <div class="col-12 col-md-3">
                    <div class="card profile-card h-auto">
                        <div class="card-body text-center">
                            {{-- UPDATED: profile card avatar --}}
                            <img src="{{ Auth::user()->profile_picture ? asset('uploads/' . Auth::user()->profile_picture) : asset('images/default.jpg') }}"
                                class="profile-avatar mb-2"
                                alt="Profile Picture">
                        </div>
                        <div class="d-flex justify-content-center mb-2 px-3">
                            <input type="file" name="profile_picture" class="form-control form-control-sm" id="inputGroupFile01" accept="image/*">
                        </div>
                        <div class="px-3 mb-3">
                            <button class="btn w-100" name="upload_pic" style="border-radius:10px;background-color:#2980b9;color:white;">
                                <i class="bi bi-camera me-1"></i> Change Photo
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <div class="card profile-card">
                        <div class="card-body">
                            <h4 class="mb-1">User Profile</h4>
                            <hr>

                            <div class="row g-3 mb-2">
                                <div class="col-12 col-sm-4">
                                    <label class="form-label fw-bold small text-muted">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label class="form-label fw-bold small text-muted">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label class="form-label fw-bold small text-muted">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="" disabled {{ is_null(Auth::user()->gender) ? 'selected' : '' }}>Select gender</option>
                                        <option value="male"   {{ Auth::user()->gender === 'male'   ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ Auth::user()->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <h6 class="mt-3 mb-2">Change Password</h6>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">Current Password</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">New Password</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">Confirm Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>

                            <div class="mt-4 d-flex gap-2 flex-wrap">
                                <button name="update_user" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> Save Changes
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

    <!-- success toast -->
    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-bg-success border-0">
            <div class="d-flex">
                <div class="toast-body">{{ session('success') }}</div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <!-- error toast -->
    @if($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="errorToast" class="toast align-items-center text-bg-danger border-0">
            <div class="d-flex">
                <div class="toast-body">{{ $errors->first() }}</div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var successToast = document.getElementById('successToast');
            var errorToast = document.getElementById('errorToast');
            if (successToast) new bootstrap.Toast(successToast).show();
            if (errorToast) new bootstrap.Toast(errorToast).show();
        });

        // Mobile nav drawer
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