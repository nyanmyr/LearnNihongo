<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LearnNihongo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            /* Replace these with your specific colors */
            --primary-brand: #c1001c;    /* Your main brand color (e.g., Red) */
            --secondary-brand: #fff8ec;  /* Light background/accent */
            --accent-brand: #c05151;     /* Darker accent (e.g., Blue) */
            --success-brand: #2a9d8f;    /* Color for "Correct" answers */
            --dark-bg: #61010f;          /* Navbar / Footer background */
        }

        /* Override Bootstrap Classes */
        .bg-dark { background-color: var(--dark-bg) !important; }
        .btn-primary {
            background-color: var(--primary-brand) !important;
            border-color: var(--primary-brand) !important;
        }
        .btn-success {
            background-color: var(--success-brand) !important;
            border-color: var(--success-brand) !important;
        }
        .text-primary { color: var(--primary-brand) !important; }

        /* Custom background for the whole app */
        body { background-color: #fcfcfc; }

        /* Card styling to match the new theme */
        .card { border-left: 5px solid var(--primary-brand); }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">おかえりなさい!</h3>
                        <p class="text-center text-muted small">Login to continue your streak</p>

                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" required autofocus>
                                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </form>
                        <p class="text-center mt-3 small">New here? <a href="{{ route('register') }}">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
