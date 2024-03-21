@if(!session('employeesuccess'))
    <script>
        window.location.href='/';
    </script>
@endif
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
            <a href = "/employees/Home">
                <i class="fa-solid fa-house"></i>
                <span class="nav-item">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href = "/employees/User-Info">
                <i class="fa-solid fa-user"></i>
                <span class="nav-item">User</span>
            </a>
            <span class="tooltip">User Info</span>
        </li>
        <li>
            <a href = "/employees/Announcement">
                <i class="fa-solid fa-bullhorn"></i>
                <span class="nav-item">Announcement</span>
            </a>
            <span class="tooltip">Announcement</span>
        </li>

        <li>
            <a href = "/employees/Document-Request">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="nav-item" >Document Request</span>
            </a>
            <span class="tooltip" style="white-space:nowrap;">Document Request</span>
        </li>

        <li>
            <a href = "/employees/Calendar">
                <i class="fa-solid fa-calendar"></i>
                <span class="nav-item">Calendar</span>
            </a>
            <span class="tooltip">Calendar</span>
        </li>
        <li>
            <a href = "/employees/Time-Record">
                <i class="fa-solid fa-clock"></i>
                <span class="nav-item" style="height:50px;">Time Record</span>
            </a>
            <span class="tooltip">Time Record</span>
        </li>
        
        <li>
            <a onclick = "logout()">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-item">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>