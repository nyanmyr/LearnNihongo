<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $lesson->title }} - LearnNihongo</title>
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
            <div class="col-md-8">
                <a href="{{ route('lessons.index') }}" class="btn btn-sm btn-secondary mb-3">← Back to Path</a>

                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h1 class="display-5 fw-bold mb-4">{{ $lesson->title }}</h1>

                        <div class="lesson-content fs-5 mb-5">
                            {!! nl2br(e($lesson->content_text)) !!}
                        </div>

                        <div class="text-center border-top pt-4">
                            <p class="text-muted">Ready to test your knowledge?</p>
                            <a href="{{ route('quiz.show', $lesson->id) }}" class="btn btn-lg btn-success px-5">Take the Quiz!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
