<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PMS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">

    <!-- Favicon and Icons -->
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/calendar_script.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <a href="{{ route('adminDashboard') }}">
                <img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo">
            </a>
        </div>

        <ul class="sidebar-menu">
            <li><a href="{{ route('adminDashboard') }}" class="active"><i class="fa-solid fa-house-user"></i> Home</a></li>
            <li><a href="{{ route('admindashboardAttendance') }}"><i class="fa-regular fa-calendar-check"></i> Attendance</a></li>
            <li><a href="{{ route('admindashboardPayslipSalary') }}"><i class="fa fa-user-tie"></i> Set Salary</a></li>
            <li><a href="{{ route('admindashboardPayroll') }}"><i class="fa-solid fa-file-invoice-dollar"></i> Payslip</a></li>
        </ul>

        <div class="wrapper">
            <header>
                <div class="icons">
                    <span id="prev" class="icons material-symbols-rounded">Chevron_left</span>
                    <p class="current-date"></p>
                    <span id="next" class="icons material-symbols-rounded">Chevron_right</span>
                </div>
            </header>
            <div class="calendar">
                <ul class="weeks">
                    <li>S</li><li>M</li><li>T</li><li>W</li><li>T</li><li>F</li><li>S</li>
                </ul>
                <div class="section-divider1"></div>
                <ul class="days"></ul>
            </div>
        </div>
    </div>

    <div class="body">
        <ul class="navigation">
            <li>
                <div class="sidebar-menu">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" onclick="validateLogin()"> <i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </div>
            </li>
        </ul>

        <div class="page-header">
            <div class="nav-header">
                <h2>Payroll Management System <small>ADMIN PANEL</small></h2>
            </div>

            <ul class="sub-header">
                <li>HOME | Welcome Back Administrator!</li>
                <div class="spacer"></div>
                <strong>Announcement:</strong> Please check attendance logs.<br>
                <strong>Announcement:</strong> Don't forget to Update List!
            </ul>

            <div class="body-header"></div>
        </div>

        <div class="section-divider"></div>
    </div>
</body>

</html>
