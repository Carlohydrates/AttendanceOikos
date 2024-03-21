<ul id="announcement-list">
    @foreach ($announcements as $announcement)
        <a href="/students/Announcement/View{{ $announcement->id }}">
            <li class="announcement">
                <div class="sender-icon">
                    <img src="{{ $announcement->icon_url }}" alt="user icon" class="sender-img">
                </div>
                <div class="announcement-header">
                    <h3>{{ $announcement->title }}</h3><br>{{ $announcement->subject }}
                </div>
                <div class="announcement-details">
                    {{ $announcement->created_at }}<br>By: Admin{{ $announcement->author }}
                </div>
            </li>
        </a>
    @endforeach
</ul>
<!--<div class="container">
    <div class="announcement-logs">
        <div class="header">Announcement Logs
            <div class="search">
                <input type="text" id="search-bar" size="30" placeholder="Search...">
            </div>
        </div>
        <ul id="announcement-list">
            <a href="/students/Announcement/View">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/emp_ph.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Welcome</h3><br>Announcement to New Students</div>
                    <div class="announcement-details">19/01/23<br>By: Amalee</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/pfp.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Reporting</h3><br>Math 101</div>
                    <div class="announcement-details">05/01/23<br>By: Cy Yu Tech</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/pfp.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Long Quiz</h3><br>Gen Math</div>
                    <div class="announcement-details">03/01/23<br>By: Kaela</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/emp_ph.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Short Quiz</h3><br>Purposive Communication</div>
                    <div class="announcement-details">03/01/23<br>By: Amalee</div>
                </li>
            </a>
        </ul>
    </div>
</div>-->