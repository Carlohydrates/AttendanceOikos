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
   
    <title>Oikos Student: Time Record</title>
</head>
<body>
    @include('component.student.sidenav')
    @include('component.student.export_toaster')
    <div class="main-content">
        <h1>Time Record</h1>
        <div class="log-body">
            <div style = "z-index:1;" class="log-container">
                <div class="filter-container">
                        <div>
                            <label for="startDate" style="color: white;">Date:</label>
                            <input type="date" id="startDate" style="padding: 7px;  border: 2px solid black; border-radius: 5px;">
                            <label for="endDate" style="color: white;">-</label>
                            <input type="date" id="endDate" style="padding: 7px; margin-right: 10px; border: 2px solid black; border-radius: 5px;">
                        </div>
                        <button onclick="applyFilter()" class="filter" style="background-color:rgba(0, 255, 102, 0.714)"> Apply Filter </button>
                        <button onclick="clearFilter()" class="clearfilter" style="background-color:red">Clear Filter</button>
                    </div>
                <table id="dataTable" style = "width: 100%;" class="attendance-type">
                    <thead>
                        <tr>
                            <th colspan="3"></th>
                            <th colspan="2">Morning Attendance</th>
                            <th colspan="2">Afternoon Attendance</th>
                            <th colspan="2">Evening Attendance</th>
                        </tr>
                        <tr>
                            <th>Student Name</th>
                            <th>Date</th>
                            <th>Section</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>In</th>
                            <th>Out</th>
                        </tr>
                    </thead>
                    <tbody id="logTableBody">
                        @foreach($student_logs as $logs)
                            <tr>
                                <td>{{$logs->name}}</td>
                                <td>{{$logs->date_created}}</td>
                                <td>{{$logs->section}}</td>
                                <td>{{((int)substr($logs->checked_in,0,2)<12&&$logs->checked_in!==null)?$logs->checked_in." AM":''}}</td>
                                <td>{{((int)substr($logs->checked_out,0,2)<12&&$logs->checked_out!==null)?$logs->checked_out." AM":''}}</td>
                                <td>{{((int)substr($logs->checked_in,0,2)>=12 && (int)substr($logs->checked_in,0,2)<18 && $logs->checked_out!==null)?$logs->checked_in." PM":''}}</td>
                                <td>{{((int)substr($logs->checked_out,0,2)>=12&& (int)substr($logs->checked_in,0,2)<18 && $logs->checked_out!==null)?$logs->checked_out." PM":''}}</td>
                                <td>{{((int)substr($logs->checked_in,0,2)>=18&&$logs->checked_in!==null)?$logs->checked_in." PM":''}}</td>
                                <td>{{((int)substr($logs->checked_out,0,2)>=18&&$logs->checked_out!==null)?$logs->checked_out." PM":''}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    <script src="/JS/Student/studentTime_record.js"> </script>
    <script src="/JS/logout.js"></script>
</body>
</html>