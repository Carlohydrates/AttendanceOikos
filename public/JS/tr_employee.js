function applyFilter() {
    var role = document.getElementById("role").value;
    var name = document.getElementById("nameFilter").value.toLowerCase();
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;
    var table = document.getElementById("dataTable");
    var rows = table.getElementsByTagName("tr");

    var rowsArray = [];
    
    for (var i = 2; i < rows.length; i++) {
        rowsArray.push(rows[i]);
    }

    rowsArray.sort(function(a, b) {
        var dateA = new Date(a.getElementsByTagName("td")[2].innerText);
        var dateB = new Date(b.getElementsByTagName("td")[2].innerText);
        return dateA - dateB;
    });

    var tbody = table.getElementsByTagName("tbody")[0];
    tbody.innerHTML = "";

    for (var i = 0; i < rowsArray.length; i++) {
        tbody.appendChild(rowsArray[i]);
    }

    for (var i = 0; i < rowsArray.length; i++) {
        var row = rowsArray[i];
        var nameCell = row.getElementsByTagName("td")[0].innerText.toLowerCase();
        var roleCell = row.getElementsByTagName("td")[1];
        var dateCell = row.getElementsByTagName("td")[2].innerText;
        if ((role === "" || roleCell.innerHTML === role) &&
            (name === "" || nameCell.includes(name)) &&
            (startDate === "" || dateCell >= startDate) &&
            (endDate === "" || dateCell <= endDate)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

function clearFilter() {
    document.getElementById("nameFilter").value = "";
    document.getElementById("role").value = "";
    document.getElementById("startDate").value = "";
    document.getElementById("endDate").value = "";
    applyFilter();
}


// Function to handle QR code scanning
function handleQRScan(qrData) {
    // Get the current date and time
    var currentDate = new Date().toISOString().slice(0, 10); // Format: YYYY-MM-DD
    var currentTime = new Date().toLocaleTimeString(); // Format: HH:MM:SS

    // Update the HTML table with current date and time
    var table = document.getElementById('dataTable');
    var tbody = table.getElementsByTagName('tbody')[0];
    var newRow = tbody.insertRow();
    var nameCell = newRow.insertCell(0);
    var roleCell = newRow.insertCell(1);
    var dateCell = newRow.insertCell(2);
    var inCell = newRow.insertCell(3);
    var outCell = newRow.insertCell(4);

    // Set the employee's name and role based on the QR data
    nameCell.innerHTML = "Janedoe"; // Replace with logic to get name from QR data
    roleCell.innerHTML = "IT"; // Replace with logic to get role from QR data

    dateCell.innerHTML = currentDate; // Insert current date
    inCell.innerHTML = currentTime; // Insert current time as time in
    outCell.innerHTML = ""; // Leave time out cell empty initially
}
function fetchEmployeeName(employeeId){
    fetch(`/retrieve-employeename/${employeeId}`,{
        method:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrf.content
        }
    })
    .then(response => response.json())
    .then(data =>{
        if (data.success) {
            const employee = data.user_data[0];
            const fullName = `${employee.fname} ${employee.minitial} ${employee.lname}`;
            document.getElementById('employeeName').textContent = fullName;
        }
    })
    .catch(error => console.error('Error:', error));
}

function retrieve_data(id){
    employee_id = id;
    console.log("hello world");
    fetch("/retrieve-employee",{
        method: 'POST',
        headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
        body:JSON.stringify({user_id:id})
    })
    .then(response=>response.json())
    .then(data =>{
        if(data.success){
            var user_instance = data.user_data;
            showModal.classList.remove('hidden')
            console.log(user_instance[0].employee_id);
            let roleButton = document.querySelector('.role-btn');
            let emlSelection = document.querySelector('.eml-selection');
            fetchEmployeeName(employee_id);
        }
    })
}