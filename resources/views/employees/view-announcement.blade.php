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
            width: 90%;
            align-self: center;
        }
        #container-subject{
            font-weight: 400;
            width: 90%;
            align-self: center;
            margin-top: 0.5em;
        }
        .poster-info{
            display: flex;
            background-color: white;
            margin: 1em;
            margin-top: 1em;
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
            width: 90%;
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
                <h1 class="ann-header"><a href = "/employees/Announcement"  style = "color: rgba(100, 100, 100, 0.700); text-decoration: none;">Announcements ></a> </h1>
                <h1 class="ann-title" style = "margin-left: 0.3em;">Post</h1>
                <div class="ann-container">
                    <div class="header-container">
                        <h2 id=container-title>Welcome</h2>
                        <h3 id=container-subject>Announcement to New Employees</h3>
                    </div>
                    <div class="poster-info">
                        <i class="fas fa-user-circle"></i>
                        <h3 style = "margin-left: 1em;">Amalee</h3>
                        <h4 style = "margin-left: 62em; font-weight: 400;">19/01/2023</h4>
                    </div>
                    <textarea cols="30" rows="30" readonly>🌟 Welcoming the Bright Stars to Oikos Technologies! 🌟

                        Dear Oikos Team, Excitement is in the air as we proudly introduce the newest members of our 
                        family!  Each of our new recruits brings a unique set of skills, experiences, and enthusiasm that will undoubtedly enrich our workplace.
                        Let's extend a warm welcome to:
                        1. Elly Roi Francisco
                        2. Kafelnikov Dela Rosa
                        3. Carlo Cruz
                        4. Adrian Xavier B Miranda
                        5. Duane Chanbonpin
                        6. Miguel Jacinto
                        7. Tyrone Calbang
                        8. Angeline Garduque
                        Your presence adds incredible value to our team, and we're thrilled to embark on this journey together. As we grow and evolve, your contributions will be instrumental in shaping the success of Oikos Technologies. To our new recruits, your talents have already made an impact, and we can't wait to see the extraordinary accomplishments that lie ahead. Remember, you're not just joining a company; 
                        
                        you're becoming an integral part of a supportive community dedicated to growth and collaboration.
                        Please join us in extending a heartfelt welcome to our newest members. Here's to a bright future filled with shared achievements and a thriving Oikos team! Cheers to new beginnings!
                        Best regards,
                        
                        
                        Jonel Rubio [CEO] [Oikos Technologies]
                        </textarea>
                </div>
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