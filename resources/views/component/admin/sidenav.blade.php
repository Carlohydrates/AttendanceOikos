@if(!session('adminsuccess'))
    <script>
        window.location.href='/';
    </script>
@endif
@php
    use App\Models\Admin;
    $email=Auth::guard('users')->user()->email;
    $employee_name=Employees::select('fname','lname')
        ->where('email',$email)
        ->first();
@endphp
<div class="sidebar">
    <div class="top">
        <div class="logo">
            <i class="fa-solid fa-user-secret"></i>
            <span>Oikos</span>
        </div>
        <i class="fa-solid fa-bars btn-nav" id = "btn"></i>
    </div>
    <div class="user">
        <img src ="" alt="secret-user" class = "user-img">
        <div class="">
            <p class = "bold">Kafelnikov Dela Rosa</p>
            <p>(Admin)</p>
        </div>
    </div>
    <ul>
        <li>
            <a href = "/admin/Dashboard">
                <i class="fa-solid fa-house"></i>
                <span class="nav-item">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href = "/admin/Announcement">
                <i class="fa-solid fa-bullhorn"></i>
                <span class="nav-item">Announcement</span>
            </a>
            <span class="tooltip">Announcement</span>
        </li>

        <li>
            <a href = "/admin/Document_Request">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="nav-item" >Document Request</span>
            </a>
            <span class="tooltip" style="white-space:nowrap;">Document Request</span>
        </li>

        <li>
            <a href = "/admin/Calendar">
                <i class="fa-solid fa-calendar"></i>
                <span class="nav-item">Calendar</span>
            </a>
            <span class="tooltip">Calendar</span>
        </li>
        <li>
            <a href = "/admin/Time_Record">
                <i class="fa-solid fa-clock"></i>
                <span class="nav-item" style="height:50px;">Time Record</span>
            </a>
            <span class="tooltip">Time Record</span>
        </li>
        <li>
            <a href = "/admin/Student_Masterlist">
                <i class="fa-solid fa-graduation-cap"></i>
                <span class="nav-item" style="height:50px;">Student Masterlist</span>
            </a>
            <span class="tooltip">Student Masterlist</span>
        </li>

        <li>
            <a href = "/admin/Employee_Masterlist">
                <i class="fa-solid fa-users"></i>
                <span class="nav-item" style="height:50px;">Employee Masterlist</span>
            </a>
            <span class="tooltip">Employee Masterlist</span>
        </li>

        
        <li>
            <a onclick="logout()">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-item">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>