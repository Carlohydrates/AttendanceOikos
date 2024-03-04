<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets/Oikos Logo.png">
    <link rel="stylesheet" href="/CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Oikos Admin: Announcement</title>

    <style>
        body {
            overflow: hidden; 
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .custom-popup {
            display: none;
            position: fixed;
            top: 20%;
            left: 33%;
            z-index: 3;
        }

        .popup-content {
            background-color: #fff;
            padding: 5%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
            width: 200%;
            text-align: center; 
        }

        .close-popup {
            position: absolute;
            top: 5%;
            right: 5%;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50px;
            border: 1px solid #000000; 
            padding: 0.05% 1%
                }

        #announcement-title {
            margin-bottom: 1%;
            width: 100%; 
            padding: 1%;
            box-sizing: border-box;
            border: none;
            border-bottom: 1px solid #000000;
            transition: border-bottom 0.3s ease;
            outline: none;
        }

        #announcement-subject {
            margin-bottom: 1%;
            width: 100%; 
            padding: 1%;;
            box-sizing: border-box;
            border: none;
            border-bottom: 1px solid #000000;
            transition: border-bottom 0.3s ease;
            outline: none;
                }

        #announcement-body {
            margin-bottom: 1%;
            width: 100%; 
            padding: 10%;
            box-sizing: border-box;
            border-radius: 12px;
            text-align: center;
            font-size: 200%;
            resize: none;
        }

        #confirm-add-announcement {
            background-color: #031f42;;
            color: white;
            border: none;
            padding: 2%;
            border-radius: 24px;
            cursor: pointer;
            width: 20%;
        }

        #confirm-add-announcement:hover {
            background-color: #073672;
        }

        h2 {
            margin-bottom: 10%;
            margin-left: -57%;
        }

        label[for="Title"],
        label[for="Subject"],
        label[for="Body"] {
            display: block; 
            text-align: left;
            margin-bottom: 1%; 
        }

        label[for="add-recepient"] {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .Recepient{
            margin-left: 50%;
            margin-top: -8%;
        }

        #add-recepient{
            width: 50%;
            height: 2vh;
            border-radius: 24px;
            resize: none;
        }

        
    </style>

</head>

<body>
    @include('component.admin.sidenav')

    <div class="main-content">
        <h1>Announcement</h1>
        <div class="container">
            <button id="add-announcement-btn">+ Add Announcement</button>
            @include('component.admin.announcement_component')
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Custom popup -->
    <div class="custom-popup" id="custom-popup">
        <div class="popup-content">
            <span class="close-popup" id="close-popup">&times;</span>
            <h2>Post an Announcement</h2>  
                <div class = "Recepient">
                    <label for="add-recepient" id="add-recepient">TO:</label> 
                    <textarea id="add-recepient" placeholder="Add Recepient"></textarea>
                </div>
            <label for="Title" id="Title">Title:</label>
            <input type="text" id="announcement-title" placeholder="Welcome">
            <label for="Subject" id="Subject">Subject:</label>
            <input type="text" id="announcement-subject" placeholder="Annoucement to all new members of Oikos Technologies.">
            <label for="Body" id="Body">Body:</label>
            <textarea id="announcement-body" placeholder="Announcement Body"></textarea>
            <button id="confirm-add-announcement">Post</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let overlay = document.getElementById('overlay');
            let customPopup = document.getElementById('custom-popup');
            let closePopupBtn = document.getElementById('close-popup');
            let confirmAddAnnouncementBtn = document.getElementById('confirm-add-announcement');
            let btnAddAnnouncement = document.querySelector('#add-announcement-btn');
        
            btnAddAnnouncement.addEventListener('click', function () {
                overlay.style.display = 'block';
                customPopup.style.display = 'block';
                customPopup.classList.add('fade-in');
            });
        
            closePopupBtn.addEventListener('click', function () {
                overlay.style.display = 'none';
                customPopup.style.display = 'none';
            });
        
            confirmAddAnnouncementBtn.addEventListener('click', function () {
                const title = document.getElementById('announcement-title').value;
                const subject = document.getElementById('announcement-subject').value;
                const body = document.getElementById('announcement-body').value;
        
                if (!title || !subject || !body) {
                    alert('Please fill in all fields');
                    return;
                }
        
                fetch('/admin/Announcement/Add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        title: title,
                        subject: subject,
                        body: body,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response as needed
                    console.log('Announcement added:', data);
        
                    // Close the popup
                    overlay.style.display = 'none';
                    customPopup.style.display = 'none';
        
                     window.location.reload();
                })
                .catch(error => console.error('Error:', error));
            });
        });
        </script>
        
    <script src="/JS/navevent.js"></script>
</body>
</html>
