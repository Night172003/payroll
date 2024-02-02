<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PMS</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+g5R4LcDA2D2QQknDd9NIfY4EUL2n" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">

    <!-- External Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>
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
        </div>
    </div>

    <div class="body">
        <ul class="navigation">
            <li>
                <div class="sidebar-menu">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" onclick="validateLogin()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
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
                    <label>Select Name:</label>
                    <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Employee Name" title="Search employee">
                    <label>Start Date:</label>
                    <input type="date" id="startDateInput" oninput="searchFunction()" placeholder="Select Start Date">

                    <label>End Date:</label>
                    <input type="date" id="endDateInput" oninput="searchFunction()" placeholder="Select End Date">
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
                        @php
                            $attendanceFound = false;
                        @endphp

                        @foreach($employees as $employee)
                            @if(isset($employee['employee_attendance']) && is_array($employee['employee_attendance']) && count($employee['employee_attendance']) > 0)
                                @foreach($employee['employee_attendance'] as $attendance)
                                    <tr>
                                        <td>{{ $attendance['AttendanceID'] }}</td>
                                        <td>{{ $employee['EmpID'] }}</td>
                                        <td>{{ implode(' ', [$employee['FirstName'], $employee['MiddleName'], $employee['LastName']]) }}</td>
                                        <td>{{ $employee['job']['JobName'] }}</td>
                                        <td>{{ $attendance['Date'] }}</td>
                                        <td>{{ $attendance['PunchIn'] }}</td>
                                        <td>{{ $attendance['PunchOut'] }}</td>
                                        <td>{{ $employee['EmpType'] }}</td>
                                    </tr>
                                    @php
                                        $attendanceFound = true;
                                    @endphp
                                @endforeach
                            @endif
                        @endforeach
                        @if (!$attendanceFound)
                            <tr>
                                <td colspan="8">No attendance records to show for any employee</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div> <!--  eof body container -->
        </div> <!--  eof page header  -->
    </div> <!--  eof class body  -->
</body>

</html>
