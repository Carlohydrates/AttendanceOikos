<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- implemented sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Admin: Student Time Record</title>
    <style>

        .time-record,
        .tr-label {
            display: inline;
        }

        .section-header {
			margin: 20px;
			background-color: #323468;
			border-radius: 5px;
			height: 100px;

			header {
                padding-top: 25px;
				margin: 20px;
				display: flex;
				justify-content: space-between;

            }

            header .searchbox {
					display: flex;
					padding: 10px;
					background-color: #ffffff;
                    border: 1px solid #bbc3c9;
					border-radius: 5px;
					width: 25%;

                }
					
            .searchbox .icon {
						color: #bbc3c9;
						margin: 0 5px;
					}

					input.search-text {
                        border: none;
						background-color: inherit;
						font-size: 1em;
						font-weight: 600;
						outline: none;						
					}
				
			
		}
	
.section-header {
	header .app-list-options {
		display: flex;
		justify-items: center;
		align-items: center;
        margin-left: auto;
        }

        .custom-select {
            display: flex;
            background-color: #ffffff;
			border-radius: 5px;
			padding: 10px;
			color: black;
			font-size: .75em;
			font-weight: 600;
            width: 500%;
            margin-right:5px;
        }



        .custom-select select{
        appearance: none;
        -webkit-appearance: none;

        width: 100%;
        border: none;
        font-size: 1rem;
        background-color: #fff;
        color: #000;
        }

        
        .custom-select i{
        font-size:20px;
        }

		.display-group {
			display: flex;
			.icon {
				margin-right:0;
				margin-left: 0;
			}
		}

        .filter{

            display:flex;
            padding:10px;
            background-color:#5C5EB3;
            font-size:1em;
			font-weight:600;
            width: 5rem;
            color:white;
            border:none;
        }

        .filter:hover {
            cursor: pointer;
        }
	}


.section-content{

    margin: 20px;
			background-color: #ffffff;
			border-radius: 5px;
			height: 500px;

}

.section-content .student-group{
            display:flex;
            flex-direction:column;
            margin-top:2em;
            padding:1em;
            background-color:white;
            width:100%;
        }

        .student-group .table-header{
            display:flex;
            justify-content: space-between;
        }
        .table-header .field-group{
            display:flex;
            justify-content: space-between;
            padding:.3em;
            width:15%;
            border-radius:10px;
            border:1px solid black;
        }
        .table-header .field-group{
            display:flex;
            justify-content: space-between;
            width:15%;
            border-radius:10px;
            border:1px solid black;
            transition:border 150ms ease-in-out;
        }
        .table-header .field-group input{
            border:none;
            width:90%;
        }
        .table-header .field-group input:focus{
            outline:none;
        } 
        #count{
            height:30px;
            width:30px;
            font-weight:lighter;
            font-size:1rem;
            color:white;
            display:flex;
            align-items:center;
            justify-content: center;
            border-radius:50%;
            background-color:#ff3131;
        }
        .attendance-type {
            padding: 10px;
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
        .fc{
            width:100%;
            height:50em;
        }
        .list{
            margin-top:1em;
            display:flex;
            flex-direction:column;
        }
        .list .data{
            display:flex;
            justify-content:flex-start;
            align-items: center;
            margin-top:.5em;
        }
        .list .data .point{
            height:.8em;
            width:.8em;
            border-radius:50%;
        }
        .list .data .date{
            margin-left:.5em;
        }
        .list .data .date{
            margin-left:.5em;
        }
        .list .data .event{
            margin-left:5em;
            color:#606360;
        }
        #applyFilterBtn {
            margin-right: 1rem;
        }
        #applyFilterBtn:hover , #clearFilterBtn:hover {
            background-color: #ffffff;
            color: #5C5EB3;
        }

    </style>
</head>
<body>
    @include('component.admin.sidenav')

    <div class="main-content">
        <h1 class="time-record"><a href = "/admin/Time_Record"  style = "color: rgba(100, 100, 100, 0.700); text-decoration: none;">Time Record ></a></h1>
        <h1 class="tr-label" style = "margin-left: 0.3em;">Student Logs</h1>
        <div class="container">

            <section class="section-header">

					<header>

						<div class="searchbox">
							<input type="text" id="nameFilter" name="search" placeholder="Name of Student" class="search-text"> 
						</div>

                        <div class="app-list-options">

                            <div class="custom-select" style="padding:14px;">

                            <i class="fa fa-caret-down" aria-hidden="true"></i>

                            <select style="margin-left:5px;" id="gradeFilter">
                            <option value="" disabled selected hidden>Filter by Grade</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            
                            
                            </select>

                        
                            </div>

                            <div class="custom-select" style="padding:14px;">

                                <i class="fa fa-caret-down" aria-hidden="true"></i>

                                <select style="margin-left:5px;" id="sectionFilter">
                                    <option value="" disabled selected hidden>Filter by Section</option>
                                    <option value="A">Section A</option>
                                    <option value="B">Section B</option>
                                    <option value="B">Section C</option>
                                </select>
                            </div>

                        <div class="custom-select">

                            <span style="margin-right:5px;"> Date <br> From </span> <input type="date" id="dateFromFilter">

                        </div>

                        <div class="custom-select" style="margin-right:20px;">

                            <span style="margin-right:5px;"> Date <br> From </span> <input type="date" id="dateToFilter">

                        </div>

                            <button onclick="applyFilter()" class="filter" id="applyFilterBtn"> Apply Filter </button>
							
						</div>

                        <div>
                            <button onclick="clearFilter()" class="filter" id="clearFilterBtn"> Clear Filter </button>
                        </div>
                    </div>

					</header>

            </section>

            <section class="section-content">

            <div class="student-group">
                <div class="table-header">
                </div>
                <div class="log-body">
                <table id="dataTable" style = "width:100%;" class="attendance-type">
    <thead>

    <tr>
                <th colspan="4"></th>
                <th colspan="2">Morning Attendance</th>
                <th colspan="2">Afternoon Attendance</th>
                <th colspan="2">Evening Attendance</th>
            </tr>

        <tr>

            <th>Name</th>
            <th>Grade</th>
            <th>Section</th>
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
        @foreach ($Student_logs as $Student_log)
            @php
                $check_in_time = strtotime($Student_log->checked_in);
                $check_out_time = strtotime($Student_log->checked_out);

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
                <td>{{$Student_log->name}}</td>
                <td>{{$Student_log->grade}}</td>
                <td>{{$Student_log->section}}</td>
                <td>{{$Student_log->date_created}}</td>
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
    </div>


    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
        function logout(){
            Swal.fire({
                position: 'center',
                icon: 'question',
                title: 'Are you sure you want to log-out',
                cancelButtonText:'No',
                showConfirmButton: true,
                confirmButtonColor: 'green',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Reload the page
                    window.location.href='/admin/logout';
                }
            });
        }

    </script>

<script>
    function applyFilter() {
        var grade = document.getElementById("gradeFilter").value;
        var section = document.getElementById("sectionFilter").value;
        var name = document.getElementById("nameFilter").value.toLowerCase();
        
        var table = document.getElementById("dataTable");
        var rows = table.getElementsByTagName("tr");
        
        for (var i = 2; i < rows.length; i++) {
            var row = rows[i];
            var nameCell = row.getElementsByTagName("td")[0].innerText.toLowerCase();
            var gradeCell = row.getElementsByTagName("td")[1];
            var sectionCell = row.getElementsByTagName("td")[2];
            
            if ((grade === "" || gradeCell.innerHTML === grade) &&
                (section === "" || sectionCell.innerHTML === section) &&
                (name === "" || nameCell.includes(name))) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }

    function clearFilter() {
        // Reset the filters to default values
        document.getElementById("gradeFilter").selectedIndex = 0;
        document.getElementById("sectionFilter").selectedIndex = 0;
        document.getElementById("nameFilter").value = "";
        document.getElementById("dateFromFilter").value = "";
        document.getElementById("dateToFilter").value = "";
        applyFilter();
    }
</script>


</body>
</html>