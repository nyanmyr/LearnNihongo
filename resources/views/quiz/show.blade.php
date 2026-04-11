<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Set - LearnNihongo</title>
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
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">{{ $lesson->title }} Quiz</h2>

                <form method="POST" action="{{ route('quiz.submit', $lesson->id) }}">
                    @csrf

                    @foreach($lesson->quizzes as $index => $quiz)
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body p-4">
                            <h5>Question {{ $index + 1 }}:</h5>
                            <p class="fs-4">{{ $quiz->question_text }}</p>

                            <input type="text" name="answers[{{ $quiz->id }}]"
                                   class="form-control"
                                   placeholder="Type answer here..."
                                   required autocomplete="off">
                        </div>
                    </div>
                    @endforeach

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg shadow">Submit All Answers</button>
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-link text-muted">Go back to lesson</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
