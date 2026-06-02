<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset("images/bg.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
        }   

        .card {
            border-radius: 10px;
            border-top: 4px solid #3498db;
        }

        .icon-header {
            width: 20px;
            height: 20px;
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
                        <h4 class="text-center mb-1">Registration</h4>
                        <p class="text-center text-muted mb-3">Create an Account</p>
                        <hr>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Full Name"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>

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

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-person-fill me-1"></i> Gender
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                        value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                        value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label">Female</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-2">
                                <i class="bi bi-person-check me-1"></i> Register
                            </button>

                            <p class="text-center mt-3 mb-0">
                                Already have an account? <a href="{{ route('login') }}">Log in</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Toast --}}
    @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    {{-- Error Toast --}}
    @if($errors->any())
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ $errors->first() }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Success Toast
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }

        // Error Toast
        var errorToastEl = document.getElementById('errorToast');
        if (errorToastEl) {
            var errorToast = new bootstrap.Toast(errorToastEl, { delay: 4000 });
            errorToast.show();
        }
    </script>

</body>
</html>