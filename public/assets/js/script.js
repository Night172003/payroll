// document.addEventListener("DOMContentLoaded", function () {
//     var savedUsername = localStorage.getItem("savedUsername");
//     var savedPassword = localStorage.getItem("savedPassword");
//     var rememberMeCheckbox = document.getElementById("rememberMe");
//     var usernameInput = document.getElementById("username");
//     var passwordInput = document.getElementById("password");

 
//     if (savedUsername && savedPassword && rememberMeCheckbox.checked) {
//         usernameInput.value = savedUsername;
//         passwordInput.value = savedPassword;
//     }
// });

function validateLogin() {
    var usernameInput = document.getElementById("username");
    var passwordInput = document.getElementById("password");
    var rememberMeCheckbox = document.getElementById("rememberMe");
    var notification = document.getElementById("notification");

    var username = usernameInput.value;
    var password = passwordInput.value;

    // Check if username and password are not empty
    if (username.trim() === "" || password.trim() === "") {
        displayNotification("Username and password are required.", "error");
        return;
    }

    if (username === "admin" && password === "password") {
      
        if (rememberMeCheckbox.checked) {
            localStorage.setItem("savedUsername", username);
            localStorage.setItem("savedPassword", password);
        } else {
          
            localStorage.removeItem("savedUsername");
            localStorage.removeItem("savedPassword");
        }

        
        window.location.href = "home.html";
    } else {
        displayNotification("Invalid username or password.", "error");
        // Clear the form on unsuccessful login
        usernameInput.value = "";
        passwordInput.value = "";
    }
}

function displayNotification(message, type) {
    var notification = document.getElementById("notification");

    // Set the message and styling based on the notification type
    notification.innerHTML = message;

    // Display the notification and hide it after 3 seconds
    notification.style.display = "block";

    setTimeout(function () {
        notification.style.display = "none";
    }, 3000);
}

window.addEventListener('keydown', function (event) {
    if (event.code === 'Enter') {
        validateLogin(); 
    }
});
const currentPage = window.location.pathname;
const links = document.querySelectorAll('.sidebar-menu a');

links.forEach(link => {
  if (link.getAttribute('href') === currentPage) {
    link.classList.add('active');
  }
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Get all sidebar links
    var sidebarLinks = document.querySelectorAll(".sidebar-menu a");

    // Remove the 'active' class from all links
    sidebarLinks.forEach(function (link) {
        link.classList.remove("active");
    });

    // Loop through each link and check if it matches the current URL
    sidebarLinks.forEach(function (link) {
        if (link.href === currentUrl) {
            // Add the 'active' class to the matching link
            link.classList.add("active");
        }
    });
});
//Delete icon
  function deleteRow(button) {
    var row = button.closest('tr');
    row.remove();
  }

//Search Employee within the Employee Payslip
function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.trim().toUpperCase(); // Trim extra spaces from the input
    table = document.getElementById("employee-records");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; 
        if (td) {
            txtValue = td.textContent || td.innerText;
            txtValue = txtValue.trim().toUpperCase(); // Trim extra spaces from the table cell content
            if (txtValue.indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


// Popup form
function openForm() {
    document.getElementById("Emp-Form").style.display = "block";
}

function closeForm() {
    document.getElementById("Emp-Form").style.display = "none";
}

function validateNumberInput(event) {
    var input = event.target;
    
    // Remove non-numeric characters from the input value
    input.value = input.value.replace(/\D/g, '');

    // You can add additional logic here if needed
}
    

function saveForm() {
    // Extract values from the table-container
    var tableValues = [];
    $(".table-container table tbody tr").each(function () {
        var type = $(this).find("td:nth-child(2)").text().trim();
        var amount = $(this).find("td:nth-child(3)").text().trim();
        tableValues.push({ type: type, amount: amount });
    });

    // Extract value from the basic salary input
    var basicSalary = $(".input-field input[name='basic-salary']").val();

    // You can now send the extracted values to the server or perform other actions as needed
    console.log("Table Values:", tableValues);
    console.log("Basic Salary:", basicSalary);

    // Hide or show columns based on whether there are rows in the table
    var tableContainer = $(".table-container");
    if (tableValues.length > 0) {
        tableContainer.show();
    } else {
        tableContainer.hide();
    }

    // Close the form (for demonstration purposes; you may handle it differently)
    closeForm();
}

// Salary input
$(document).ready(function () {
    $(".create-table-btn").click(function () {
        // Find the closest table-container within the same card
        var tableContainer = $(this).closest('.card').find('.table-container');

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

        // Show the table container
        tableContainer.show();

        // Check the number of rows and add scrollbar if needed
        checkRowCountAndAddScrollbar(tableContainer);
    });

    // Handle row deletion
    $(document).on('click', '.delete-row-btn', function () {
        // Find the closest row and remove it
        $(this).closest('tr').remove();

        // Check the number of rows and add or remove scrollbar
        var tableContainer = $(this).closest('.card').find('.table-container');
        checkRowCountAndAddScrollbar(tableContainer);
    });

    function checkRowCountAndAddScrollbar(tableContainer) {
        var rowCount = tableContainer.find('tbody tr').length;

        // Adjust max-height and overflow properties based on the row count
        if (rowCount > 3) {
            tableContainer.css({
                'max-height': '200px',  // Set your desired max-height
                'overflow-y': 'auto'
            });
        } else {
            tableContainer.css({
                'max-height': 'none',
                'overflow-y': 'visible'
            });
        }
    }
});





