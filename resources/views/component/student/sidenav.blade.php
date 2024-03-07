@if(!session('studentsuccess'))
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
        <i class="fa-solid fa-bars btn-nav" id = "btn"></i>
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
            <a href = "/students/Home">
                <i class="fa-solid fa-house"></i>
                <span class="nav-item">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href = "/students/User-Info">
                <i class="fa-solid fa-user"></i>
                <span class="nav-item">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        <li>
            <a href = "/students/Announcement">
                <i class="fa-solid fa-bullhorn"></i>
                <span class="nav-item">Announcement</span>
            </a>
            <span class="tooltip">Announcement</span>
        </li>
        <li>
            <a href = "/students/Calendar">
                <i class="fa-solid fa-calendar"></i>
                <span class="nav-item">Calendar</span>
            </a>
            <span class="tooltip">Calendar</span>
        </li>
        <li>
            <a href = "/students/Time-Logs">
                <i class="fa-solid fa-clock"></i>
                <span class="nav-item" style="height:50px;">Time Record</span>
            </a>
            <span class="tooltip">Time Record</span>
        </li>
        
        <li>
            <a href = "/students/logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-item">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>
