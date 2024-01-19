<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - PMS</title>
    <!-- imports -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+g5R4LcDA2D2QQknDd9NIfY4EUL2n" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <a href="home.html"><img src="{{ url('assets/images/Logo2.png')}}" alt="Logo" class="sidebar-logo"></a>
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
            <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <<button type="submit" onclick="validateLogin()"> <i class="fas fa-sign-out-alt"></i> Logout</a>
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
                <li>EMPLOYEE PAYSLIP | Welcome Back Administrator!</li>
            </ul>
            <div class="section-divider"></div>

                <div class="body-container">
                    <h3>EMPLOYEE PAYSLIP</h3>
                    <div class="body-header">
                        <label for="bdaymonth">Select Range</label>
                        <input type="month" id="bdaymonth" name="bdaymonth">

                        <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search Employee" title="Search employee">
                        <button class="add-payroll-btn">+</button>
                    </div>

                <table class="table-record" id="employee-records">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMP ID</th>
                            <th>NAME</th>
                            <th>POSITION</th>
                            <th>PAY PERIOD</th>
                            <th>EMP TYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row, you can dynamically populate this with data from your backend -->
                        @foreach($payslipData as $payslip)
                        <tr>
                        
                        <td>{{ $payslip['id'] }}</td>
                        <td>{{ $payslip['emp_id'] }}</td>
                        <td>{{ $payslip['name'] }}</td>
                        <td>{{ $payslip['position'] }}</td>
                        <td>{{ $payslip['pay_period'] }}</td>
                        <td>{{ $payslip['emp_type'] }}</td>
                        <td>
                                <div class="action-buttons">
                                <button class="action-button edit-button" onclick="openForm()"><i class="fa-regular fa-pen-to-square"></i></button>
                                <button class="action-button delete-button" onclick="deleteRow(this)"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </td>
                    </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                <!-- PAGINATION -->
                <div class="pagination-container">
                    <div class="pagination-bar">
                        <button class="pagination-button"><i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-button">Prev</button>
                        <button class="pagination-button">Next</button>
                        <label for="page-num">Page:
                            <input type="text" id="page-num" placeholder="1" />
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
            </div>
            <!--  eof attendance container -->
        </div>
        <!--  eof page header  -->
    </div>
    <!--  eof class body  -->

   <!-- Popout Form -->
   <div class="form-popup" id="Emp-Form">
        <div class="form-container">
            <h1>EMPLOYEE PAYSLIP</h1>
            <div class="section-divider2"></div>

            <!-- Employee Details -->
            <form action="#">
                <div class="employee record">
                    <!-- <span class="title">Employee Details</span> -->
                    <div class="fields">
                        <div class="input-field">
                            <label>Employee ID</label>
                            <input type="text" placeholder="R-0000" readonly>
                        </div>

                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Juan Dela C. Cruz" readonly>
                        </div>
                        <div class="input-field">
                            <label>Status</label>
                            <input type="text" placeholder="Full-time" readonly>
                        </div>

                        <div class="input-field">
                            <label>Position</label>
                            <input type="text" placeholder="Software Developer" readonly>
                        </div>

                        <div class="input-field">
                            <label>Present Days</label>
                            <input type="number" placeholder="0" readonly>
                        </div>

                        
                        <div class="input-field">
                            <label>Pay Period</label>
                            <input type="number" placeholder="January 15-30, 2023" readonly>
                        </div>

                        <div class="input-field">
                            <label>Basic Salary</label>
                            <input type="number" placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>

                <div class="section-divider2"></div>
                <!-- Salary Input -->
                <div class="card-container">
                  <!-- Card 1 -->
                  <div class="card">
                    <div class="card-header">Allowance<button class="create-table-btn">+</button></div>
                    <div class="card-body">
                      <div class="table-container"></div>
                      <p>Total Allowance: 0</p>
                      </div>  
                    </div>
                  
                
                  <!-- Card 2 -->
                  <div class="card">
                    <div class="card-header">Deduction<button class="create-table-btn">+</button></div>
                    <div class="card-body">
                      <div class="table-container"></div>
                      <p>Total Deduction: 0 </p>
                    </div>
                  </div>
                </div>
                  <!-- eof card-container -->
            </form>

               <!-- Net Pay -->
               <div class="net-pay-container">
              <label for="net-pay">Net Pay: 0</label>
            </div>
            <div class="section-divider2"></div>
         
                    <!-- Save button -->
                    <div class="button-container">
                        <button type="button" class="save-button" onclick="saveForm()">Update</button>
                        <button type="button" class="close-button" onclick="closeForm()">Close</button>
                    </div>
                 <!-- End of Save button --> 
            </div>
            <!-- End of form Container -->
        </div>
      <!-- End of Form Popup -->
    </div>
  
  
</body>

</html>