<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/student.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .log-body{
            background-color: #f2f2f2;
            margin: 1em;
            padding: 0;
            display: flex;

        }
        .log-container {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .filter-container {
            background-color: #323468;
            color: #fff;
            padding: 15px;
            text-align: left;
        }

        .filter-container label {
            margin-right: 10px;
        }

        .filter-container input[type="date"] {
            margin-right: 10px;
        }

        .filter-container button {
            margin-top: 10px;
        }

        .attendance-type {
            background-color: #f2f2f2;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .attendance-type th,
        .attendance-type td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .attendance-type th {
            background-color: #323468;
            color: #fff;
        }

        .attendance-type tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .attendance-type tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Oikos Student: Time Record</title>
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="fa-solid fa-user-secret"></i>
                <span>Oikos</span>
            </div>
            <i class="fa-solid fa-bars" id = "btn"></i>
        </div>
        <div class="user">
            <img src ="" alt="secret-user" class = "user-img">
            <div class="">
                <p class = "bold">Kafelnikov Dela Rosa</p>
                <p>(Student)</p>
            </div>
        </div>
        <ul>
            <li>
                <a href = "home">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href = "user">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href = "announcement">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="nav-item">Announcement</span>
                </a>
                <span class="tooltip">Announcement</span>
            </li>
            <li>
                <a href = "calendar">
                    <i class="fa-solid fa-calendar"></i>
                    <span class="nav-item">Calendar</span>
                </a>
                <span class="tooltip">Calendar</span>
            </li>
            <li>
                <a href = "time_record">
                    <i class="fa-solid fa-clock"></i>
                    <span class="nav-item" style="height:50px;">Time Record</span>
                </a>
                <span class="tooltip">Time Record</span>
            </li>
            
            <li>
                <a href = "/studentlogout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Time Record</h1>
        <div class="container">
        </div>
        <div class="log-body">
            <div style = "z-index:1;" class="log-container">
                <div class="filter-container">
                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate">
                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate">
                    <button>Apply</button>
                </div>
        
                <table style = "width: 100%;" class="attendance-type">
                    <thead>
                        <tr>
                            <th colspan="3"></th>
                            <th colspan="2">Morning Attendance</th>
                            <th colspan="2">Afternoon Attendance</th>
                            <th colspan="2">Evening Attendance</th>
                        </tr>
                        <tr>
                            <th>Student Name</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>In</th>
                            <th>Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Student</td>
                            <td>2024-01-30</td>
                            <td>09:00 AM</td>
                            <td>01:00 PM</td>
                            <td>06:00 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
    </script>


</body>
</html>