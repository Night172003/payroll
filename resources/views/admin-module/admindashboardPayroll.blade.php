<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - PMS</title>
    <!-- imports -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+g5R4LcDA2D2QQknDd9NIfY4EUL2n" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <script src="{{ asset('assets/js/calendar_script.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <a href="{{ route('adminDashboard') }}"><img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo"></a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('adminDashboard') }}"><i class="fa-solid fa-house-user"></i> Home</a></li>
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
            <div class="sidebar-menu">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" onclick="validateLogin()"> <i class="fas fa-sign-out-alt"></i> Logout</button>
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
                <li>PAYROLL LIST | Welcome Back Administrator!</li>
            </ul>
            <div class="section-divider"></div>

            <div class="body-container">
                <h3>PAYROLL LIST</h3>
                <div class="body-header">
                    <label for="date-range">Select Range</label>
                    <input type="month" id="bdaymonth" name="bdaymonth">
                    <input type="text" id="myInput" onkeyup="RefFunction()" placeholder="Search Reference No."
                        title="Search employee">
                    <button class="add-payroll-btn">+</button>
                </div>

                <table class="table-record" id="payroll-list">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REFERENCE NO.</th>
                            <th>MONTH</th>
                            <th>DATE FROM</th>
                            <th>DATE TO</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row, you can dynamically populate this with data from your backend -->
                        @foreach($payrollData as $payroll)
                        <tr>
                            <td>{{ $payroll['id'] }}</td>
                            <td>{{ $payroll['ref_no'] }}</td>
                            <td>{{ $payroll['month'] }}</td>
                            <td>{{ $payroll['date_from'] }}</td>
                            <td>{{ $payroll['date_to'] }}</td>
                            <td>{{ $payroll['status'] }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-button view-button" onclick="viewForm()"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button delete-button" onclick="deleteRow(this)"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>