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
    var nameInput, startDateInput, endDateInput, table, tr, nameFilter, startDate, endDate, dateColumnIndex, td, i, nameTxtValue, dateTxtValue;

    // Get the values of employee name and date inputs
    nameInput = document.getElementById("myInput");
    startDateInput = document.getElementById("startDateInput");
    endDateInput = document.getElementById("endDateInput");

    // Trim extra spaces from the inputs
    nameFilter = nameInput.value.trim().toUpperCase();
    startDate = startDateInput.value.trim();
    endDate = endDateInput.value.trim();

    // Table and row elements
    table = document.getElementById("employee-records");
    tr = table.getElementsByTagName("tr");
    dateColumnIndex = 4; // Adjust this value to match the index of the date column

    // Loop through all table rows, and hide those that don't match the search criteria
    for (i = 0; i < tr.length; i++) {
        // Get the employee name and date cells
        td = tr[i].getElementsByTagName("td")[2]; // Adjust this value to match the index of the name column
        var dateCell = tr[i].getElementsByTagName("td")[dateColumnIndex];

        // Check if both name and date cells exist
        if (td && dateCell) {
            // Get the text content of the name and date cells
            nameTxtValue = td.textContent || td.innerText;
            dateTxtValue = dateCell.textContent.trim();

            // Trim extra spaces from the text content
            nameTxtValue = nameTxtValue.trim().toUpperCase();

            // Check if the name matches the search criteria
            if (nameTxtValue.indexOf(nameFilter) > -1) {
                // Check if the date range is specified
                if (startDate !== "" && endDate !== "") {
                    // Check if the date falls within the specified range
                    if (isDateInRange(new Date(dateTxtValue), new Date(startDate), new Date(endDate))) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                } else {
                    // If no date range is specified, show the row
                    tr[i].style.display = "";
                }
            } else {
                // Hide the row if the name doesn't match the search criteria
                tr[i].style.display = "none";
            }
        }
    }
}

// Function to check if a date is within a specified range
function isDateInRange(date, startDate, endDate) {
    return date >= startDate && date <= endDate;
}
//Popup form
// function openForm() {
//     document.getElementById("Emp-Form").style.display = "block";
// }

function closeForm() {
    document.getElementById("Emp-Form").style.display = "none";
}

function openaddEmpForm() {
    document.getElementById("Emp-Add-Form").style.display = "block";
}

function closeEmpForm() {
    document.getElementById("Emp-Add-Form").style.display = "none";
}

function saveEmpForm() {
    closeEmpForm();
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



