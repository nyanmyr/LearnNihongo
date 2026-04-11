<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lessons - LearnNihongo</title>
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
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/LearnNihongo_Logo.png') }}"
                alt="LearnNihongo Logo"
                width="40"
                height="40"
                class="me-2">
            LearnNihongo
            </a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">Japanese Learning Path</h2>
        <div class="row">
            @foreach($lessons as $lesson)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $lesson->title }}</h5>
                        <p class="card-text text-muted">{{ $lesson->description }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-outline-primary w-100">Study Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
