<ul id="announcement-list">
    @foreach ($announcements as $announcement)
        <a href="/admin/Announcement/View">
            <li class="announcement">
                <div class="sender-icon">
                    <img src="{{ $announcement->icon_url }}" alt="user icon" class="sender-img">
                </div>
                <div class="announcement-header">
                    <h3>{{ $announcement->title }}</h3><br>{{ $announcement->subject }}
                </div>
                <div class="announcement-details">
                    {{ $announcement->created_at }}<br>By: {{ $announcement->author }}
                </div>
            </li>
        </a>
    @endforeach
</ul>

<!-- Front End Visualization
<div class="container">
    <div class="announcement-logs">
        <div class="header">Announcement Logs
            <div class="search">
                <input type="text" id="search-bar" size="30" placeholder="Search...">
            </div>
        </div>
        <ul id="announcement-list">
            <a href="/admin/Announcement/View">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/female_emp1.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Welcome</h3><br>Welcome New Employees</div>
                    <div class="announcement-details">19/01/23<br>By: Amalee</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/male_emp1.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Maintenance Report</h3><br>Version 1.23</div>
                    <div class="announcement-details">05/01/23<br>By: David</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/pfp.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Website Update</h3><br>Version 1.22</div>
                    <div class="announcement-details">03/01/23<br>By: Kaela</div>
                </li>
            </a>
            <a href="">
                <li class="announcement">
                    <div class="sender-icon"><img src="../assets/female_emp1.jpg" alt="user icon" class="sender-img"></div>
                    <div class="announcement-header"><h3>Additional Employee Guidelines</h3><br>Version 2.20</div>
                    <div class="announcement-details">03/01/23<br>By: Amalee</div>
                </li>
            </a>
        </ul>
    </div>
</div>
-->