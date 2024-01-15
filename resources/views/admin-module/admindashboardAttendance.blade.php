<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PMS</title>
    <!-- imports -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <script src="{{ asset('assets/js/calendar_script.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <a href="home.html"><img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo"></a>
        </div>
        <ul class="sidebar-menu">
                <li><a href="{{ route('adminDashboard') }}" class="active"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="{{ route('admindashboardAttendance') }}"><i class="fa-regular fa-calendar-check"></i> Attendance</a></li>
                <li><a href="{{ route('admindashboardEmployees') }}"><i class="fa fa-user-tie"></i> Employees</a></li>
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
        </div>
    </div>

    <div class="body">
        <ul class="navigation">
            <li>
                <div class="user">
                    <img src="{{ url('assets/images/users/dj.jpg')}}" />
                    <span class="online-indicator"></span>
                    <a href="login.html" class="name">
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
                    <label for="date-range">Select Range</label>
                    <input type="date" id="date" value="current-date">
                    
                    <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search Employee" title="Search employee">
                 
                </div>

                <table class="table-record" id="employee-records">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMP ID</th>
                            <th>NAME</th>
                            <th>POSITION</th>
                            <th>WORKING HOURS</th>
                            <th>EMP TYPE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row, you can dynamically populate this with data from your backend -->
                        <tr>
                            <td>1</td>
                            <td>R-0000</td>
                            <td>Juan Dela Cruz</td>
                            <td>Software Developer</td>
                            <td>12:12</td>
                            <td class="emp-type-column">
                                <div class="emp-type full-time">Full-time</div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>R-0000</td>
                            <td>Juan Dela Cruz</td>
                            <td>Software Developer</td>
                            <td>11:11</td>
                            <td class="emp-type-column">
                                <div class="emp-type part-time">Part-time</div>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>

                <!-- PAGINATION -->
                <div class="pagination-container">
                    <div class="pagination-bar">
                        <button class="pagination-button"><i class="fas fa-chevron-left"></i></button>
                        <button class="pagination-button">Prev</button>
                        <button class="pagination-button">Next</button>
                        <label for="page-num">Page:
                            <input type="text" id="page-num" placeholder="1">
                        </label>
                        <span id="page-size">of 5</span>
                        <select id="entries" name="entries">
                            <option value="entries">5</option>
                            <option value="entries">10</option>
                            <option value="entries">15</option>
                        </select>
                    </div>
                </div>
                <!-- EOF PAGINATION -->
            </div> <!--  eof body container -->
        </div> <!--  eof page header  -->
    </div> <!--  eof class body  -->
</body>

</html>

   <!-- <button id="show-report">Show Report</button> -->
                    <!-- <label for="department">Department</label>
                    <select id="department" name="department">
                        <option value="full-stack">Development</option>
                        <option value="front-end">QUality Assurance</option>
                        <option value="backend">Project Management</option>
                    </select> -->