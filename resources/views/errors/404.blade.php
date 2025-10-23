<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-secondary">404</h1>
            <p class="fs-3 fw-semibold text-secondary mt-4">Page Not Found</p>
            <p class="text-muted mt-4">The page you are looking for might have been removed or is temporarily unavailable.</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-4 px-4 py-2">
                Return Home
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
