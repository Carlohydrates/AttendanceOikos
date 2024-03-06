<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/student.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- implemented sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Student: Calendar</title>

</head>
<body>
    
    @include('component.student.sidenav')
   
    <div class="main-content">
        <h1>Calendar</h1>
        <div class="button_cont">
        <button class="option"style="margin-right: 1em; font-size:100%;"> +Add Notes</button>
        </div>

        <!--cover-->
        <div class="select_cover" style="display:none;" >
            <h1 style="font-size:10rem; color:#d9d9d9;">SELECT DATE</h1>
            
        </div>

        <div class="chosen" >

            <h2>Select a Date...</h2>

            <!--This is Viewiing-->
        <div class="content" style="display:none;" >
        <h2> Title: <span>This is the Sample of a title</span></h2>
        <h2> Subject: <span style = "width: 50rem;">This is the Sample of a Subject</span></h2>
            <div class="flex-container">
                <h2 > Duration:<span style="width: 22.1rem; margin-bottom:0em"> Thiasdasdasd</span> </h2>
                <h2> Venue:  <span style="width: 22.1rem;">This</span></h2>
            </div>
        <h2> Theme: <span style = "width: 50.5rem;">Galaga</span></h2>
       
        <h2> Message:</h2>
        <div class="message">

            
        </div> 
        </div>

    </div>
    
        <div class="c_container">
            <div id='calendar'></div>
            <h2 style="padding-left:2rem; color:#9f9f9f;">Upcoming events</h2>
            <div class="events_summ">
                <div class="circle"></div>
                <h3>Sample Event title </h3>
                <p>Select a date</p>
                
                
            </div>
        </div>
    </div>


    <script src = "/JS/Student/studentCalendar.js"></script>


</body>
</html>