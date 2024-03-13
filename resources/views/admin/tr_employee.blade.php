User
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/Oikos Logo.png">
    <link rel="stylesheet" href="/CSS/admin.css">
    <link rel="stylesheet" href="/CSS/tr_employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- implemented sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Admin: Employee Time Record</title>
</head>
<body>
    @include('component.admin.sidenav')
    <div class="main-content">
        <h1 class="time-record"><a href="/admin/Time_Record" style="color: rgba(100, 100, 100, 0.700); text-decoration: none;">Time Record ></a></h1>
        <h1 class="tr-label" style="margin-left: 0.3em;">Employee Logs</h1>
        <div class="container">
            <section class="section-header">
                <header>
                    <div class="searchbox">
                        <input type="text" id="nameFilter" name="search" placeholder="Name of Employee" class="search-text" oninput="applyFilter()"> 
                    </div>
                    <div class="app-list-options">
                        <div>
                            <label for="role" style="color: white;"></label>
                            <select id="role" oninput="applyFilter()" style="padding: 7px; border: 2px solid black; border-radius: 5px;">
                                <option value="" disabled selected>Role</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                            <label for="startDate" style="color: white;">Date:</label>
                            <input type="date" id="startDate" style="padding: 7px;  border: 2px solid black; border-radius: 5px;">
                            <label for="endDate" style="color: white;">-</label>
                            <input type="date" id="endDate" style="padding: 7px; margin-right: 10px; border: 2px solid black; border-radius: 5px;">
                        </div>
                        <button onclick="applyFilter()" class="filter" style="background-color:rgba(0, 255, 102, 0.714)"> Apply Filter </button>
                        <button onclick="clearFilter()" class="clearfilter" style="background-color:red">Clear Filter</button>
                    </div>
                </header>
            </section>
            <section class="section-content">
                <div class="student-group">
                    <div class="table-header"></div>
                    <div class="log-body">
                        <table id="dataTable" style="width:100%;" class="attendance-type">
                            <thead>
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="2">Morning Attendance</th>
                                    <th colspan="2">Afternoon Attendance</th>
                                    <th colspan="2">Evening Attendance</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
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
                                @foreach ($Employee_logs as $Employee_log)
                                @php
                                    $check_in_time = strtotime($Employee_log->checked_in);
                                    $check_out_time = strtotime($Employee_log->checked_out);
                    
                                    $morning_check_in = '';
                                    $morning_check_out = '';
                                    $afternoon_check_in = '';
                                    $afternoon_check_out = '';
                                    $evening_check_in = '';
                                    $evening_check_out = '';
                    
                                    if ($check_in_time >= strtotime('06:00:00') && $check_in_time < strtotime('12:00:00')) {
                                        $morning_check_in = date('H:i:s', $check_in_time);
                                    } elseif ($check_in_time >= strtotime('12:00:00') && $check_in_time < strtotime('18:00:00')) {
                                        $afternoon_check_in = date('H:i:s', $check_in_time);
                                    } else {
                                        $evening_check_in = date('H:i:s', $check_in_time);
                                    }
                    
                                    if ($check_out_time >= strtotime('06:00:00') && $check_out_time < strtotime('12:00:00')) {
                                        $morning_check_out = date('H:i:s', $check_out_time);
                                    } elseif ($check_out_time >= strtotime('12:00:00') && $check_out_time < strtotime('18:00:00')) {
                                        $afternoon_check_out = date('H:i:s', $check_out_time);
                                    } else {
                                        $evening_check_out = date('H:i:s', $check_out_time);
                                    }
                                @endphp
                                <tr>
                                    <td>{{$Employee_log->name}}</td>
                                    <td>{{$Employee_log->role == "T" ? "Teacher" : "IT"}}</td>
                                    <td>{{$Employee_log->date_created}}</td>
                                    <td>{{$morning_check_in}}</td>
                                    <td>{{$morning_check_out}}</td>
                                    <td>{{$afternoon_check_in}}</td>
                                    <td>{{$afternoon_check_out}}</td>
                                    <td>{{$evening_check_in}}</td>
                                    <td>{{$evening_check_out}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="/JS/navevent.js"></script> 
    <script src="/JS/tr_employee.js"></script>
</body>
</html>