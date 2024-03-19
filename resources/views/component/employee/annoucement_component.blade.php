<ul id="announcement-list">
    @foreach ($announcements as $announcement)
        <a href="/employees/Announcement/View{{ $announcement->id }}">
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