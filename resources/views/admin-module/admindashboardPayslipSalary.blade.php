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
                <li>EMPLOYEE PAYSLIP | Welcome Back Administrator!<br>
                    Don't forget to Update List!
                </li>
            </ul>
            <div class="section-divider"></div>

                <div class="body-container">
                    <h3>EMPLOYEE PAYSLIPS</h3>
                    <div class="body-header">
                        
                        <label for="bdaymonth">Select Name:</label>
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
                            <th>SALARY</th>
                            <th>NET SALARY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach ($adminEmpPayslips as $employeeData)
                    <tr>
                        <td>{{$employeeData['id']}}</td>
                        <td>{{ $employeeData['EmpID'] }}</td>
                        <td>{{ $employeeData['FirstName'] . ' ' .$employeeData['MiddleName'] .' '.$employeeData['LastName'] }}</td>
                        <td>{{ $employeeData['JobName'] }}</td>
                        <td>{{ $employeeData['EmpType'] }}</td>
                        <td></td>
                        <td></td>
			            <td>
                            <div class="action-buttons">
                            <button class="action-button edit-button" data-empid="{{ $employeeData['EmpID'] }}" onclick="openForm(this)"><i class="fa-regular fa-pen-to-square"></i></button>
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
                            <input type="text" id="EmpIdInput" placeholder="R-0000" readonly>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id="FirstNameInput" placeholder="Juan Dela C. Cruz" readonly >
                        </div>

                        <div class="input-field">
                            <label>Present Days</label>
                            <input type="number" id="PresentDaysInput" placeholder="0">
                        </div>

                        <div class="input-field">
                            <label>Position</label>
                            <input type="text" id="JobNameInput" placeholder="Software Developer" readonly>
                        </div>
                        
                        
                        <div class="input-field">
                            <label>Paid Time Off</label>
                            <input type="number" id="LeaveInput" placeholder="0" readonly>
                        </div>

                        <div class="input-field">
                            <label>Pay Period Start Date</label>
                            <input type="Date" id="PayPeriodStartDate">
                        </div>

                        <div class="input-field">
                            <label>Pay Period End Date</label>
                            <input type="Date" id="PayPeriodEndDate">
                        </div> 

                        <div class="input-field">
                            <label>Basic Salary</label>
                            <input type="number" id="BasicSalaryInput" placeholder="Enter Amount">
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
                            <div class="table-container" id="allowance-table"></div>
                            <p id="totalAllowance">Total Allowance: 0</p>
                        </div>  
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="card-header">Deduction<button class="create-table-btn">+</button></div>
                        <div class="card-body">
                            <div class="table-container" id="deduction-table"></div>
                            <p id="totalDeduction">Total Deduction: 0</p>
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
                    <button type="button" class="save-button" onclick="ComputeForm()">Compute</button>
                        <button type="button" class="close-button" onclick="saveForm()">Update</button>
                        <button type="button" class="save-button" onclick="closeForm()">Close</button>
                    </div>
                 <!-- End of Save button --> 
            </div>
            <!-- End of form Container -->
        </div>
      <!-- End of Form Popup -->
    </div>
  
    </body>
    
<script>
    document.getElementById('fetchAndSaveLink').addEventListener('click', function (event) {
        event.preventDefault();

        fetch("{{ route('fetchdata') }}", {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                // Add any other headers as needed
            },
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                location.reload();
                alert('Database has been updated!');
            })
            .catch(error => {
                console.error('Error:', error);
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
    EmpID = button.getAttribute('data-empid');

    // Fetch data based on EMP ID from your backend (you may use AJAX)
    Promise.all([fetchDataFromBackend(EmpID), fetchLeaveData(EmpID)])
        .then(([employeeData, leaveData]) => {
            // Update the form fields with the fetched data
            document.getElementById('EmpIdInput').value = employeeData.data.EmpID;
            document.getElementById('FirstNameInput').value = `${employeeData.data.FirstName} ${employeeData.data.MiddleName} ${employeeData.data.LastName}`;
            document.getElementById('JobNameInput').value = employeeData.data.JobName;

            // Set the constant salary based on the job name
            const constantSalaries = {
                "Front-end Developer": 60000,
                "Back-end Developer": 65000,
                "Full-stack Developer": 70000,
                "DevOps Engineer": 75000,
                "Quality Assurance": 55000,
                "Product Manager": 90000,
                "Project Manager": 85000,
                "User Experience Designer": 75000,
                "User Interface Designer": 70000,
                "Software Engineer": 68000,
                // Add more jobs and salaries as needed
            };
            const jobName = employeeData.data.JobName;
            const constantSalary = constantSalaries[jobName] || 0; // Default to 0 if job name not found

            // Display the constant salary in the BasicSalaryInput field
            document.getElementById('BasicSalaryInput').value = constantSalary;

            const createdDate = new Date(employeeData.data.created_at);
            const payPeriodStartDate = createdDate.toISOString().split('T')[0];

            const endDate = new Date(createdDate);
            endDate.setDate(endDate.getDate() + 14); // 14 days is 2 weeks

            // Display the pay period start date in the PayPeriodStartDate input field
            document.getElementById('PayPeriodStartDate').value = payPeriodStartDate;

            // Display the pay period end date in the PayPeriodEndDate input field
            document.getElementById('PayPeriodEndDate').value = endDate.toISOString().split('T')[0];

            fetchPresentDays(EmpID)
                .then(presentDaysData => {
                    const presentDays = presentDaysData.present_days || 0;
                    document.getElementById('PresentDaysInput').value = presentDays;

                    // Display leave data count in the LeaveInput field
                    const leaveCount = leaveData.data || 0;
                    document.getElementById('LeaveInput').value = leaveCount;

                    // Open the form
                    document.getElementById('Emp-Form').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching present days:', error);
                    // Handle error as needed
                });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            // Handle error as needed
        });
}

        function fetchPresentDays(empId) {
        // Use your backend endpoint to fetch present days based on EMP ID
        // Replace '/employee_attendance/' with the actual path to your Laravel route
        return fetch(`/api/employee_attendance/${empId}/present-days`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            });
        }

        function fetchDataFromBackend(EmpID) {
            // Use your backend endpoint to fetch data based on EMP ID
            // Replace '/employee/' with the actual path to your Laravel route
            return fetch(`/employee/${EmpID}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();

                
                });
        }
        function fetchLeaveData(empId) {
            // Use your backend endpoint to fetch leave data based on EMP ID
            // Replace '/api/employee_leave/' with the actual path to your Laravel route
            return fetch(`/api/employee_leave/${empId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                });
        }
 // Salary input
$(document).ready(function () {
    // Function to initialize the table with default rows and values
    function initializeTable(container, values) {
        var tableContainer = container.find('.table-container');

        // Create a table with editable rows
        var tableHtml = '<table>';
        tableHtml += '<thead><tr><th>Title</th><th>Amount</th><th></th></tr></thead>';
        tableHtml += '<tbody>';

        // Add rows with predefined values
        values.forEach(function (item) {
            tableHtml += '<tr>';
            tableHtml += '<td contenteditable="true">' + item.title + '</td>';
            tableHtml += '<td contenteditable="true" class="amount-input" oninput="validateNumberInput(this)">' + item.amount + '</td>';
            tableHtml += '<td><button class="delete-row-btn"><i class="fas fa-trash-alt"></i></button></td>';
            tableHtml += '</tr>';
        });

        tableHtml += '</tbody>';
        tableHtml += '</table>';

        // Append the table to the table container
        tableContainer.html(tableHtml);
    }

    // Call the initializeTable function to add default rows with values on page load
    initializeTable($('.card:contains("Allowance")'), [
        { title: 'Internet Allowance', amount: 1000 },
        { title: 'Professional Development Allowance', amount: 2000 },
        
    ]);

    initializeTable($('.card:contains("Deduction")'), [
        { title: 'SSS', amount: 900 },
        { title: 'PHILHEALTH', amount:2000 },
        { title: 'PAGIBIG', amount: 100 }
    ]);

    $(".create-table-btn").click(function (event) {
        // Prevent the default behavior of the anchor tag
        event.preventDefault();

        // Find the closest table-container within the same card
        var tableContainer = $(this).closest('.card').find('.table-container');

        // Show the table container
        tableContainer.show();

        // Check if the table already exists
        var existingTable = tableContainer.find('table');

        // If the table already exists, add a new row
        if (existingTable.length > 0) {
            var newRow = '<tr><td contenteditable="true"></td><td contenteditable="true" class="amount-input" oninput="validateNumberInput(this)"></td><td><button class="delete-row-btn"><i class="fas fa-trash-alt"></i></button></td></tr>';
            existingTable.find('tbody').append(newRow);
        } else {
            // Create a table with editable rows
            var tableHtml = '<table>';
            tableHtml += '<thead><tr><th>Title</th><th>Amount</th><th></th></tr></thead>';
            tableHtml += '<tbody><tr><td contenteditable="true"></td><td contenteditable="true" class="amount-input" oninput="validateNumberInput(this)"></td><td><button class="delete-row-btn"><i class="fas fa-trash-alt"></i></button></td></tr></tbody>';
            tableHtml += '</table>';

            // Append the table to the table container
            tableContainer.html(tableHtml);
        }
    });

    // Handle row deletion
    $(document).on('click', '.delete-row-btn', function () {
        // Find the closest row and remove it
        $(this).closest('tr').remove();

        // Check the number of rows and add or remove scrollbar
        var tableContainer = $(this).closest('.card').find('.table-container');
    });
});
function computeTotalAllowance() {
    const allowanceInputs = $('.card:has(.card-header:contains("Allowance")) .amount-input');
    let totalAllowance = 0;

    allowanceInputs.each(function () {
        totalAllowance += parseFloat($(this).text().replace(',', '')) || 0;
    });

    $('#totalAllowance').text(`Total Allowance: ${totalAllowance.toFixed(2)}`);
}

function computeTotalDeduction() {
    const deductionInputs = $('.card:has(.card-header:contains("Deduction")) .amount-input');
    let totalDeduction = 0;

    deductionInputs.each(function () {
        totalDeduction += parseFloat($(this).text().replace(',', '')) || 0;
    });

    $('#totalDeduction').text(`Total Deduction: ${totalDeduction.toFixed(2)}`);
}

function validateNumberInput(input, event) {
    // Check if the key pressed is Enter (keyCode 13) or the Enter key in the new event code property
    if (event.key === 'Enter' || event.keyCode === 13) {
        // Prevent the default Enter key behavior in contenteditable fields
        event.preventDefault();

        // If Enter is pressed, blur the input to make it lose focus
        input.blur();
        return;
    }

    let value = $(input).text().trim(); // Use trim to remove leading/trailing spaces

    // Replace commas with empty strings to handle input like "1,000"
    value = value.replace(/,/g, '');

    // Allow decimal values with a dot or a comma
    const decimalRegex = /^-?\d*\.?\d*$/;
    
    if (decimalRegex.test(value)) {
        // If the value is a valid number, format it to two decimal places
        const formattedValue = parseFloat(value).toFixed(2);
        // Update the input's content with the formatted number
        $(input).text(formattedValue);
    } else {
        // If the value is not a valid number, set the content to 0.00
        $(input).text('0.00');
    }

    // Recompute totals after validating the input
    computeTotalAllowance();
    computeTotalDeduction();
}
function ComputeForm() {
    // Compute total allowance
    computeTotalAllowance();

    // Compute total deduction
    computeTotalDeduction();

    // Get basic salary from input field
    const basicSalary = parseFloat($('#BasicSalaryInput').val()) || 0;

    // Calculate net pay
    const totalAllowance = parseFloat($('#totalAllowance').text().replace('Total Allowance: ', '')) || 0;
    const totalDeduction = parseFloat($('#totalDeduction').text().replace('Total Deduction: ', '')) || 0;

    const netPay = basicSalary / 2 + totalAllowance - totalDeduction;

    // Display net pay
    $('.net-pay-container label').text(`Net Pay: ${netPay.toFixed(2)}`);
}
</script>

  
</html>
