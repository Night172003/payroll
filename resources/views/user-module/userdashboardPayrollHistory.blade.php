<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee - PMS</title>
    <!-- imports -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+g5R4LcDA2D2QQknDd9NIfY4EUL2n" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">  
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/852106c7be.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet2.css') }}">
    <script src="{{ asset('assets/js/calendar_script.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>



<body>
    <div class="sidebar">
        <div class="logo-container">
            <a href="home.html"><img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo"></a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('userDashboardPayslip') }}" class="active"><i class="fa-solid fa-file-invoice-dollar"></i> Payslip</a></li>
            <li><a href="{{ route('userDashboardPayrollHistory') }}"><i class="fa-solid fa-clipboard-list"></i></i>History</a></li>
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
                    <button type="submit" onclick="validateLogin()"> <i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
            </li>
        </ul>

        <div class="page-header">
            <div class="nav-header">
                <h2>Payroll Management System <small>EMPLOYEE PANEL</small></h2>
            </div>
            <ul class="sub-header">
                <li>EMPLOYEE PAYSLIP | Welcome Back!</li>
            </ul>
            <div class="section-divider"></div>

            <!-- Employee Information-->
            <div class="body-container">
                <h3>PAYSLIP HISTORY</h3>
                <div class="body-header">
                    <label for="month">Select Range</label>
                    <input type="month" id="month" name="month">

                </div>

                <section>
                    <table class="history-table">
                        <tr>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Total Earnings</th>
                            <th>Total Allowance</th>
                            <th>Total Deductions</th>
                            <th>Net Pay</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>January</td>
                            <td>2024</td>
                            <td>₱0</td>
                            <td>₱0</td>
                            <td>₱0</td>
                            <td>₱0</td>
                            <td>Processed</td>
                        </tr>
                    </table>
                </section>
                <!-- End of history table -->
            </div>
            <!--  eof Employee Payslip-->
        </div>
        <!--  eof class body  -->




</body>

</html>