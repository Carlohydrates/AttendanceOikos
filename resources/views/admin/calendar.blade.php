<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- implemented sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Admin: Calendar</title>


    <style>
        body {
            background-color: #f6f6f6;
        }
        .main-content{
            display:flex;
            flex-direction:row;
            gap:2rem;
        }
        .left-side{
            display:flex;
            flex-direction:column;
            width:50%;
            gap:1rem;
            border-radius:10px;
        }
        .left-side .button_cont{
            display:flex;
            gap:1.3rem;
        }
        .button_cont .option{
            border-radius:5px;
            padding:.7rem 1.5rem .7rem;
            color:white;
            font-size:1rem;
            border:none;
            background-color: #323468;
            opacity:100%;
            transition:opacity 125ms ease-in-out;
        }
        .button_cont .option:hover{
            opacity:75%;
            cursor:pointer;
        } 
        .left-side .chosen{
            background-color:white;
            height:100%;
            border-radius:10px;
            display:flex;
            justify-content:center;
            align-items: center;
            border-radius:10px;
        }
        .chosen-add,.chosen-edit,.chosen-add-another{
            padding:1rem;
            background-color:white;
            height:100%;
            display:flex;
            flex-direction:column;
        }
        .left-side .chosen p{
            font-size:2rem;
            color:#858282;
        }
        .right-side{
            padding:1.3rem;
            background-color:white;
            display:flex;
            flex-direction:column;
            width:50%;
            gap:1.3rem;
            border-radius:10px;
        }
        .hidden{
            position:absolute;
            top:0;
            left:0;
            visibility: hidden;
        }
        .show{
            position:relative;
            visibility:visible;
        }

        .calendar{
            height: 60%;
        }
        .fc .fc-daygrid-day-events{
            padding:0;
            margin-top:.8rem;
            display:flex;
            flex-wrap:wrap;
            justify-content: center;
        }
        .fc-direction-ltr .fc-daygrid-event.fc-event-end, .fc-direction-rtl .fc-daygrid-event.fc-event-start{
            width:12px;
            height: 12px;
            cursor: pointer;
            border-radius:50%;
        }
        #add-event{
            margin-top:2rem;
            display:flex;
            flex-direction:column;
            padding:1.3rem;
            gap:2.4rem;
        }
        .input-group,.special{
            display:flex;
        }
        .special input{
            width:50%;
        }
        .text-area{
            display:flex;
            flex-direction:column;
        }
        .input-group input{
            font-size:1.3rem;
            padding-left:.5rem;
            width:100%;
            border:none;
            border-bottom:2px solid #e2e1e1;
        }
        .input-group input:focus{
            outline:none;
        }
        #color,#edit-color{
            border:none;
            background-color:#e2e1e1;
            border-radius:5px;
            padding:2px 4px;
        }
        .input-group label{
            font-size:1.3rem;
        }
        textarea{
            font-size:1.1rem;
            padding:1rem;
            border:2px solid #e2e1e1;
        }
        #submit{
            font-size:1rem;
            width:10rem;
            padding:.7rem 1.5rem .7rem;
            color:white;
            background-color:#323468;
            border:none;
            align-self:center;
            border-radius: 5px;
            opacity:100%;
            transition:opacity 150ms ease-in-out;
        }
        #submit:hover{
            cursor:pointer;
            opacity:75%;
        }
        .events{
            display:flex;
            flex-direction:column;
            gap:1rem;
        }
        .events ul{
            display:flex;
            flex-direction:column;
            padding-left:1.5rem;
        }
        input:read-only,textarea:read-only{
            color:gray;
        }
    </style>

</head>
<body>
    
    @include('component.admin.sidenav')
    <div class="main-content">
        <div class="left-side">
            <h1>Calendar</h1>
            <div class="chosen show">
                <p>Select a date</p>
            </div>
            <div class="chosen-add hidden">
                <h1 style="align-self:center"></h1>
                <h2 style="align-self:center"></h2>
                <form id="add-event">
                    <div class="input-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" required>
                    </div>
                    <div class="input-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" required>
                    </div>
                    <div class="input-group special">
                        <label for="duration">Duration:</label>
                        <input type="text" id="duration" required>
                        <label for="venue">Venue:</label>
                        <input type="text" id="venue" required>
                    </div>
                    <div class="input-group">
                        <label for="theme">Theme:</label>
                        <input type="text" id="theme" required>
                    </div>
                    <div class="input-group text-area">
                        <label for="message">Message:</label>
                        <textarea id="message" cols="30" rows="15" style="resize:none; border-color:#eeeeee" required></textarea>
                    </div>
                    <div class="input-group">
                        <label for="color">Color:</label>
                        <input type="color" id="color" required>
                    </div>
                    <button id="submit" onclick="addEvent(event)">Submit</button>
                </form>
            </div>
            <div class="chosen-add-another hidden">
                <h1 style="align-self:center"></h1>
                <h2 style="align-self:center"></h2>
                <form id="add-event">
                    <div class="input-group">
                        <label for="title">Title:</label>
                        <input type="text" id="another-title" required>
                    </div>
                    <div class="input-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="another-subject" required>
                    </div>
                    <div class="input-group special">
                        <label for="duration">Duration:</label>
                        <input type="text" id="another-duration" required>
                        <label for="venue">Venue:</label>
                        <input type="text" id="another-venue" required>
                    </div>
                    <div class="input-group">
                        <label for="theme">Theme:</label>
                        <input type="text" id="another-theme" required>
                    </div>
                    <div class="input-group text-area">
                        <label for="message">Message:</label>
                        <textarea id="another-message" cols="30" rows="15" style="resize:none; border-color:#eeeeee" required></textarea>
                    </div>
                    <div class="input-group">
                        <label for="color">Color:</label>
                        <input type="color" id="another-color" required>
                    </div>
                    <div class="input-group" style="gap:1rem;align-self:center">
                        <button id="submit" onclick="insertEvent(event)">Submit</button>
                        <button id="submit" onclick="cancelAddEvent(event)">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="chosen-edit hidden">
                <h1 style="align-self:center"></h1>
                <h2 style="align-self:center"></h2>
                <form id="add-event">
                    <div class="input-group">
                        <label for="title">Title:</label>
                        <input type="text" id="edit-title" required readonly>
                    </div>
                    <div class="input-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="edit-subject" required readonly>
                    </div>
                    <div class="input-group special">
                        <label for="duration">Duration:</label>
                        <input type="text" id="edit-duration" required readonly>
                        <label for="venue">Venue:</label>
                        <input type="text" id="edit-venue" required readonly>
                    </div>
                    <div class="input-group">
                        <label for="theme">Theme:</label>
                        <input type="text" id="edit-theme" required readonly>
                    </div>
                    <div class="input-group text-area">
                        <label for="message">Message:</label>
                        <textarea id="edit-message" cols="30" rows="15" style="resize:none; border-color:#eeeeee" required readonly></textarea>
                    </div>
                    <div class="input-group">
                        <label for="color">Color:</label>
                        <input type="color" id="edit-color" disabled readonly>
                    </div>
                    <div id="edit-content" class="input-group" style="gap:1rem;align-self:center">
                        <button id="submit" class="add-btn" onclick="addAnotherEvent(event)">Add</button>
                        <button id="submit" class="edit-btn" onclick="editEvent(event)">Edit</button>
                        <button id="submit" class="delete-btn" onclick="deleteEvent(event)">Delete</button>
                        <button id="submit" class="update-btn hidden" onclick="updateEvent(event)">Update</button>
                        <button id="submit" class="cancel-btn hidden" onclick="cancelEvent(event)">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="right-side">
            <div class="calendar"></div>
            <div class="events">
                <h3>Upcoming Events</h3>
                <ul>
                    @foreach($schedules as $schedule)
                        <li style="color:{{$schedule->color}}; font-size:1.6rem;">
                            <small style="color:black; font-size:1.1rem;">{{$schedule->calendar_created}}</small>
                            <small style="color:black; font-size:1.1rem; margin-left:4rem;">{{$schedule->title}}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        var dates=@json($schedules);
    </script>
    <script src="/JS/adminCalendar.js"></script>
    <script src="/JS/navevent.js"></script>

</body>
</html>