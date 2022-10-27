<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>
    <link href="{{ url_for('assets','css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column h-100">
    <nav class="py-2 bg-dark border-bottom">
        <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-light px-2">Home</a></li>
            <li class="nav-item"><a href="/posts/" class="nav-link link-light px-2">Posts</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="/login/" class="nav-link link-light px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Sign up</a></li>
        </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">{{ getenv('NAV_TITLE') }}</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
            <input type="search" class="form-control rounded-0" placeholder="Search..." aria-label="Search">
        </form>
        </div>
    </header>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
    {% block body %}
    {% endblock %}
    </main>

    <footer class="footer mt-auto py-3 bg-light text-secondary">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <!-- <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap" /></svg>
                </a> -->
                <span class="mb-3 col-12 mb-md-0 text-muted">
                    &copy; {{ copyright() }} Developed with ❤ by Louis Velasco.
                </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><strong>Schools Division of Ilocos Norte</strong></li>
                <li class="ms-3"><a class="text-muted" target="_blank" href="{{ getenv('FOOTER_TWITTER') }}"><i class="bi-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" target="_blank" href="{{ getenv('FOOTER_INSTAGRAM') }}"><i class="bi-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" target="_blank" href="{{ getenv('FOOTER_FACEBOOK') }}"><i class="bi-facebook"></i></a></li>
            </ul>
        </footer>
    </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ url_for('assets', 'js/bootstrap.bundle.min.js') }}" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>