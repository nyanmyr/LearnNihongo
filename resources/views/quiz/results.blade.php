<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results - LearnNihongo</title>
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
            <div class="col-md-8 text-center">
                <div class="card shadow-sm border-0 p-5">
                    @if($score / $total >= 0.7)
                        <h1 class="display-4">おつかれ!</h1>
                        <p class="text-muted mb-4">(Otsukare - Good job!)</p>
                    @else
                        <h1 class="display-4">やってみて!</h1>
                        <p class="text-muted mb-4">(Yattemite - Try again!)</p>
                    @endif


                    <div class="mb-4">
                        <h2 class="fw-bold">Your Score: {{ $score }}/{{ $total }}</h2>
                        <div class="progress mt-3" style="height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: {{ ($score / $total) * 100 }}%"></div>
                        </div>
                    </div>

                    @if($score / $total >= 0.7)
                        <div class="alert alert-success">
                            🎉 <strong>Lesson Mastered!</strong> You earned +20 XP and kept your streak alive!
                        </div>
                    @else
                        <div class="alert alert-warning">
                            📖 <strong>Keep Practicing!</strong> You need 70% to pass this module and earn XP.
                        </div>
                    @endif

                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('lessons.index') }}" class="btn btn-primary btn-lg">Continue Learning</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
