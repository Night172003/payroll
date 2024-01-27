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
                <li>EMPLOYEE PAYSLIP | Welcome Back Administrator!</li>
            </ul>
            <div class="section-divider"></div>

                <div class="body-container">
                    <h3>EMPLOYEE PAYSLIP</h3>
                    <div class="body-header">
                        <label for="bdaymonth">Select Range</label>
                        <input type="month" id="bdaymonth" name="bdaymonth">

                        <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search Employee" title="Search employee">
                        <button class="add-payroll-btn" id="fetchAndSaveLink" href="{{ route('fetchdata') }}" method ="post">Update List</button>
                    </div>

                <table class="table-record" id="employee-records">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMP ID</th>
                            <th>FULL NAME</th>
                            <th>POSITION</th>
                            <th>EMP TYPE</th>
                            <th>PAY PERIOD</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($payslipData->unique('EmpID') as $payslip)
                    <tr data-emp-id="{{ $payslip['EmpID'] }}">
                        
                        <td>{{ $payslip['id'] }}</td>
                        <td>{{ $payslip['EmpID'] }}</td>
                        <td>{{ implode(' ', [$payslip['FirstName'], $payslip['MiddleName'], $payslip['LastName']]) }}</td>
                        <td>{{ $payslip['JobName'] }}</td>
                        <td>{{ $payslip['EmpType'] }}</td>
                        <td></td>
                        <td>
                                <div class="action-buttons">
                                <button class="action-button edit-button" onclick="openForm(this)"><i class="fa-regular fa-pen-to-square"></i></button>
                                <button class="action-button delete-button" onclick="deleteRow(this)"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </td>
                    </tr>
                        @endforeach
                        
                    </tbody>
                </table>

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
                            <input type="text" id="empIdInput" placeholder="R-0000" readonly>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id="FirstNameInput" placeholder="Juan Dela C. Cruz" readonly >
                        </div>

                        <div class="input-field">
                            <label>Employee Type</label>
                            <input type="text" id="EmpTypeInput" placeholder="Full-time" readonly>
                        </div>

                        <div class="input-field">
                            <label>Position</label>
                            <input type="text" id="PositionInput" placeholder="Software Developer" readonly>
                        </div>
                        
                        <div class="input-field">
                            <label>Present Days</label>
                            <input type="number" id="FirstNameInput" placeholder="0" readonly>
                        </div>

                        
                        <div class="input-field">
                            <label>Pay Period Start Date</label>
                            <input type="date" id="PayPeriodStartDate">
                        </div>

                        <div class="input-field">
                            <label>Pay Period End Date</label>
                            <input type="date" id="PayPeriodEndDate">
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
    
        <script>
        document.getElementById('fetchAndSaveLink').addEventListener('click', function(event) {
            event.preventDefault();  // Prevent the default link behavior (page navigation)

            fetch("{{ route('fetchdata') }}", {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    // Add any other headers as needed
                },
            })
            .then(response => response.json())
        .then(data => {
            // Handle the response data, e.g., display a message to the user
            console.log(data.message);
            location.reload();

            // Display a popup message
            alert('Database has been updated!');

        })
        .catch(error => {
            console.error('Error:', error);

            // Display an error message if needed
            alert('An error occurred while updating the database.');
        });
    });
    
    function openForm(button) {
        console.log('Button clicked!');
        if (!(button instanceof Element && button instanceof HTMLButtonElement)) {
            console.error('Invalid button element.');
            return;
        }

        // Get the clicked row
        var row = button.closest('tr');

        // Get the EMP ID from the data attribute
        var empId = row.getAttribute('data-emp-id');

        // Fetch data based on EMP ID from your backend (you may use AJAX)
        fetchDataFromBackend(empId)
            .then(data => {
                // Update the form fields with the fetched data
                document.getElementById('empIdInput').value = data.EmpID;
                document.getElementById('FirstNameInput').value = data.FirstName+ ' ' + data.MiddleName+ ' ' +data.LastName;
                document.getElementById('EmpTypeInput').value = data.EmpType;
                document.getElementById('PositionInput').value = data.JobName;

                // Update other fields as needed

                // Open the form
                document.getElementById('Emp-Form').style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                // Handle error as needed
            });
    }

    function fetchDataFromBackend(empId) {
        // Use your backend endpoint to fetch data based on EMP ID
        // Replace '/employee/' with the actual path to your Laravel route
        return fetch(`/employee/${empId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            });
    }


    </script>
</html>
