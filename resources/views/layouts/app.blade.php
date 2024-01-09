<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.6.0/math.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

</head>
<style>
    body {
        margin-top: 80px; /* Adjust this value based on your navbar height */
    }
</style>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand">School Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @if(!Auth::check())
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('login') }}">Login</a></li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
     <!-- Sidebar -->
     @if(Auth::check())
     <div class="container-fluid" id="wrapper">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <!-- Admin Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.admin') }}">
                                Dashboard
                            </a>
                        </li>

                        <!-- Teacher Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.teacher') }}">
                                Teachers Index
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.teacher') }}">
                                Teachers Create
                            </a>
                        </li>

                        <!-- Student Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.student') }}">
                                Students Index
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.student') }}">
                                Students Create
                            </a>
                        </li>

                        <!-- Parents Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.parents') }}">
                                Parents Index
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.parents') }}">
                                Parents Create
                            </a>
                        </li>

                        <!-- Subject Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.subject') }}">
                                Subjects Index
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.subject') }}">
                                Subjects Create
                            </a>
                        </li>

                        <!-- Grade Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.grade') }}">
                                Grades
                            </a>
                        </li>

                        <!-- Attendance Routes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.attendance') }}">
                                Attendance
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @endif
    <!-- ... (your existing body content) ... -->
    @yield('content')
    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
