<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #d6eaf8;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 50px;
        }

        .card {
            border-radius: 10px;
            border-top: 4px solid #3498db;
        }

        .icon-header {
            width: 60px;
            height: 60px;
            background-color: #d6eaf8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
        }

        .icon-header i {
            font-size: 1.8rem;
            color: #3498db;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .input-group-text {
            background-color: #eaf4fb;
            border-right: none;
            color: #3498db;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        a {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow mt-4 mb-5">
                    <div class="card-body p-4">

                        {{-- Header --}}
                        <div class="icon-header">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <h4 class="text-center mb-1">Login</h4>
                        <p class="text-center text-muted mb-3">Login to your Account</p>
                        <hr>

                        {{-- Validation Errors --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ $errors->first('email') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="example@email.com"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-2">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </button>

                            <p class="text-center mt-3 mb-0">
                                Don't have an account? <a href="{{ route('register') }}">Register</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast Notification --}}
    @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Toast JS --}}
    <script>
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }
    </script>

</body>
</html>