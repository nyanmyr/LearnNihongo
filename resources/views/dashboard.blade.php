<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnNihongo - Dashboard</title>
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
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/LearnNihongo_Logo.png') }}"
                    alt="LearnNihongo Logo"
                    width="40"
                    height="40"
                    class="me-2">
                LearnNihongo
            </a>
            <span class="text-white me-3">いらっしゃいませ, {{ $user->username }}!</span>

            <a class="btn btn-outline-light btn-sm" href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h2 class="fw-bold">Your Progress</h2>
                <p class="text-muted">Track your mastery and keep your streak alive!</p>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card stat-card bg-primary text-white shadow">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title">Total XP</h5>
                        <h1 class="display-4 fw-bold">{{ $user->xp }}</h1>
                        <p class="card-text">Keep completing quizzes to level up!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card stat-card bg-danger text-white shadow">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title">Day Streak</h5>
                        <h1 class="display-4 fw-bold">{{ $user->streak_days }} 🔥</h1>
                        <p class="card-text">Consistency is the key to Nihongo mastery.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card p-5 border-0 shadow-sm text-center">
                    <h3>Ready for your next bite-sized lesson?</h3>
                    <p>Interactive lessons with audio and text await you.</p>
                    <a href="{{ route('lessons.index') }}" class="btn btn-lg btn-success px-5 mt-3">Start Learning</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
