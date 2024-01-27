<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PMS</title>
    <!-- Imports -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/calendar_script.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <a href="{{ route('adminDashboard') }}"><img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo"></a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('adminDashboard') }}" class="active"><i class="fa-solid fa-house-user"></i> Home</a></li>
            <li><a href="{{ route('admindashboardAttendance') }}"><i class="fa-regular fa-calendar-check"></i> Attendance</a></li>
            <li><a href="{{ route('admindashboardPayslip') }}"><i class="fa fa-user-tie"></i> Employees</a></li>
            <li><a href="{{ route('admindashboardPayroll') }}"><i class="fa-solid fa-file-invoice-dollar"></i> Payroll</a></li>
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
                    <li>S</li>
                    <li>M</li>
                    <li>T</li>
                    <li>W</li>
                    <li>T</li>
                    <li>F</li>
                    <li>S</li>
                </ul>
                <div class="section-divider1"></div>
                <ul class="days"></ul>
            </div>
            <div class="sidebar-menu">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" onclick="validateLogin()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="body">
        <ul class="navigation">
            <li>
                <div class="user">
                    <img src="{{ url('assets/images/users/dj.jpg')}}" />
                    <span class="online-indicator"></span>
                    <a href="#" class="name">
                        <span>Daniel Ford Padilla</span>
                        <span class="sm">Administrator</span>
                    </a>
                </div>
            </li>
        </ul>

        <div class="page-header">
            <div class="nav-header">
                <h2>Payroll Management System <small>ADMIN PANEL</small></h2>
            </div>
            <ul class="sub-header">
                <li>ATTENDANCE LOGS | Welcome Back Administrator!</li>
            </ul>
            <div class="section-divider"></div>

            <div class="body-container">
                <h3>ATTENDANCE LOGS</h3>
                <div class="body-header">
                    <!--<label for="date-range">Select Range</label>
                    <input type="date" id="date" value="current-date"> -->
                    <label>Select:</label>
                    <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Employee Name" title="Search employee">
                </div>

                <table class="table-record" id="employee-records">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMP ID</th>
                            <th>NAME</th>
                            <th>POSITION</th>
                            <th>DATE</th>
                            <th>PUNCH IN</th>
                            <th>PUNCH OUT</th>
                            <th>EMP TYPE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendanceData as $attendance)
                        <tr>
                            <td>{{ $attendance['id'] }}</td>
                            <td>{{ $attendance['EmpID'] }}</td>
                            <td>{{ $attendance['FirstName'] }}</td>
                            <td>{{ $attendance['JobName'] }}</td>
                            <td>{{ $attendance['Date'] }}</td>
                            <td>{{ $attendance['PunchIn'] }}</td> 
                            <td>{{ $attendance['PunchOut'] }}</td>
                            <td>{{ $attendance['EmpType'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--  eof body container -->
        </div> <!--  eof page header  -->
    </div> <!--  eof class body  -->
</body>

</html>
