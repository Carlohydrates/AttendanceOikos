let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function () {
    sidebar.classList.toggle('active');
}
function applyFilter() {
// Get start and end dates from the input fields
var startDate = document.getElementById('startDate').value;
var endDate = document.getElementById('endDate').value;

// Get the table body
var tableBody = document.getElementById('logTableBody');

// Get all rows in the table
var rows = tableBody.getElementsByTagName('tr');

// Loop through each row and hide/show based on the date range
for (var i = 0; i < rows.length; i++) {
    var dateCell = rows[i].getElementsByTagName('td')[2]; // Assuming date is in the third column

    if (dateCell) {
        var currentDate = dateCell.textContent || dateCell.innerText;

        // Check if the date is within the specified range
        if (currentDate >= startDate && currentDate <= endDate) {
            rows[i].style.display = ''; // Show the row
        } else {
            rows[i].style.display = 'none'; // Hide the row
        }
    }
}
}
function clearFilter() {
// Get the start and end date input fields
var startDateInput = document.getElementById('startDate');
var endDateInput = document.getElementById('endDate');

// Set their values to empty strings to clear the filter
startDateInput.value = '';
endDateInput.value = '';

// Get the table body
var tableBody = document.getElementById('logTableBody');

// Get all rows in the table
var rows = tableBody.getElementsByTagName('tr');

// Loop through each row and show it
for (var i = 0; i < rows.length; i++) {
    rows[i].style.display = '';
}
}
