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
    <title>Oikos Employee: Home</title>
    <style> 
        .card{
            display:flex;
            background-color:white;
            width:100%;
            height:80vh;
            border-radius:10px;
        } 
        .card .card-sidenav{
            width:20%;
            height:100%;
            border-right:1px solid #dddddd;
            display:flex;
            flex-direction:column;
        }
        .card .card-content{
            width:80%;
        }
        .employee-info,.parent-info{
            padding:1.3em;
            display:flex;
            flex-direction:column;
            visibility:visible;
        }
        .employee-info .field-group,.parent-info .field-group{
            display:flex;
            margin-top:1em;
        }
        .employee-info .field-group .input-group,.parent-info .field-group .input-group{
            width:45%;
            display:flex;
            flex-direction:column;
        }
        .field-group .input-group input{
            width:95%;
            display:flex;
            flex-direction:column;
            padding-left:.5em;
            height:2.3em;
            font-size:1.1rem;
            color:gray;
            border:1px solid #dddddd;
            border-radius:10px;
        }
        .field-group .input-group label{
            font-size:1.2rem;
        }
        .card-sidenav .avatar-container{
            display:flex;
            flex-direction:column;
            padding:1.3em;
            height:50%;
            align-items: center;
        }
        .avatar-container img{
            width:70%;
            height:70%;
            border-radius:50%;
        }
        .avatar-container p{
            font-size:1.2rem;
        }
        .link-employee-container,.link-parent-container{
            font-size:1.2rem;
            text-align: center;
            padding:1.3em;
            cursor:pointer
        }
        .selected{
            background-color:#51558f;
            color:white;
        }
        .hide{
            visibility:hidden;
            position:absolute;
        }
        @media(max-width:1024px){
            .card .card-sidenav{
                width:30%;
                height:100%;
                border-right:1px solid #dddddd;
                display:flex;
                flex-direction:column;
            }
        }
    </style>
</head>
<body>
    @include('component.employee.sidenav')
    <div class="main-content">
        <h1>Home</h1>
        <div class="container">
            @foreach ($employee_info as $info)
            <div class="card">
                <div class="card-sidenav">
                    <div class="avatar-container">
                        <img src="/assets/pfp.jpg" alt="Doog">
                        <br>
                        <p>{{$info->fname." ".$info->lname}}</p>
                        <br>
                        <p>{{$info->employee_id}}</p>
                    </div>
                    <div class="link-employee-container selected" onclick="selectElement('.link-employee-container','.parent-info')">
                        Employee Information
                    </div>
                    
                </div>
                <div class="card-content">
                    <!-- Employee info content -->
                    <div class="employee-info">
                        <h1>Employee Information</h1>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="{{$info->fname." ".$info->minitial." ".$info->lname}}" readonly>
                            </div>
                            <div class="input-group">
                                <label for="name">Extension</label>
                                <input type="text" id="name" value="{{$info->extension == "" ? "N/A" : "$info->extension"}}" readonly>
                            </div>
                            <div class="input-group">
                                <label for="role">Role</label>
                                <input type="text" id="role" value="{{$info->position}}" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="status">Employment Status</label>
                                <input type="text" id="status" value="{{$info->status}}" readonly>
                            </div>
                            <div class="input-group">
                                <label for="Employee ID">Employee ID</label>
                                <input type="text" id="Employee ID" value="{{$info->employee_id}}" readonly>
                            </div>
                        </div>
                        <br>

                        <h1>Personal Information</h1>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" value="{{$info->email}}" readonly>
                            </div>
                            <div class="input-group">
                                <label for="Telephone Number">Telephone Number</label>
                                <input type="text" id="Telephone Number" value="{{$info->telephone_number}}" readonly>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="number">Phone number</label>
                                <input type="text" id="number" value="{{$info->phone_number}}" readonly>
                            </div>
                            <div class="input-group">
                                <label for="Personal Information">Birthday</label>
                                <input type="text" id="Birthdate" value ="{{$info->bday}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        
        



    <script>
        // Logout
        function logout() {
            Swal.fire({
                title: "Are you sure you want to logout??",
                showCancelButton: true,
                confirmButtonText: "Logout",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/employees/logout';
                }
            });
        }
        function selectElement(classSelector,showClass){
            let selectedElement=document.querySelector('.selected');
            let infoClass=document.querySelector('.hide');
            let hideClass=document.querySelector(showClass);
            let targetElement=document.querySelector(classSelector);
            selectedElement.classList.remove('selected');
            targetElement.classList.toggle('selected');
            infoClass.classList.remove('hide');
            hideClass.classList.toggle('hide');
        }
    </script>
    <script src="/JS/logout.js"></script>
</body>
</html>