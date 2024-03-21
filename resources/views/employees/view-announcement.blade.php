<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Employee: Announcement</title>
    <style>
        .ann-header,
        .ann-title {
            display: inline;
        }
        .header-container{
            background-color: #323468;
            display: flex;
            flex-direction: column;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 10px;
        }
        .ann-container{
            display: flex;
            flex-direction: column;
            width: 95%;
            margin: 25px;
            background-color: white;
        }
        .ann-container i{
            font-size: 3em;
        }
        #container-title{
            width: 100%;
            align-self: center;
        }
        #container-subject{
            font-weight: 400;
            width: 100%;
            align-self: center;
            margin-top: 0.5em;
        }
        .poster-info{
            display: flex;
            background-color: white;
            align-items: center;
            padding: 1em;
        }
        textarea{
            resize:none;
            background-color: white;
            font-family:sans-serif;
            font-size:1rem;
            padding:.5rem;
            border: none;
            width: 100%;
            align-self: center;
            text-align: justify;
            white-space: pre-line;
        }
    </style>
</head>
<body>
        @include('component.employee.sidenav')
        <div class="main-content">
            <div class="container">
                <div class="header-container">
                    <h2 id="container-title">{{ $announcement->title }}</h2>
                    <h3 id="container-subject">{{ $announcement->subject }}</h3>
                </div>
                <div class="poster-info">
                    <i class="fas fa-user-circle"></i>
                    <h3 style="margin-left: 1em;">{{ $announcement->viewpagesender }}</h3>
                    <h4 style="margin-left: 72em; font-weight: 400;">{{ $announcement->created_at }}</h4>
                </div>
                <textarea cols="30" rows="30" readonly>{{ $announcement->content }}</textarea>
            </div>
        </div>
    

    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
    </script>
    <script src="/JS/logout.js"></script>

</body>
</html>