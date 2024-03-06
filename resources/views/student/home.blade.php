<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Student: Home</title>

</head>
<body>
    @include('component.student.sidenav')
    <div class="main-content">
        <h1>Home</h1>
        <div class="container">
            <div class="card">
                <div class="card-sidenav">
                    <div class="avatar-container">
                        <img src="/assets/pfp.jpg" alt="Doog">
                        <p>Beatrice Field</p>
                        <p>202010106</p>
                    </div>
                    <div class="link-student-container selected" onclick="selectElement('.link-student-container','.parent-info')">
                        Student Information 
                    </div>
                    <div class="link-parent-container" onclick="selectElement('.link-parent-container','.student-info')">
                        Parent Information
                    </div>
                </div>
                <div class="card-content">
                    <!-- Student info content -->
                    <div class="student-info">
                        <h1>Student Information</h1>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="Beatrice Field" readonly>
                            </div>
                            <div class="input-group">
                                <label for="school-year">School Year</label>
                                <input type="text" id="school-year" value="1st year high" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="status">Enrollment Status</label>
                                <input type="text" id="status" value="Enrolled" readonly>
                            </div>
                            <div class="input-group">
                                <label for="fetcher">Fetcher</label>
                                <input type="text" id="fetcher" value="School Bus" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="status">Phone number</label>
                                <input type="text" id="status" value="09121234569" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- Parent information content-->
                    <div class="parent-info hide">
                        <h1>Parent Information</h1>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="Beatrice Field" readonly>
                            </div>
                            <div class="input-group">
                                <label for="school-year">Cellphone Number</label>
                                <input type="text" id="school-year" value="09154054370" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="input-group">
                                <label for="status">Telephone number</label>
                                <input type="text" id="status" value="N/A" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--Student Information-->
    <script src= "/JS/Student/studentHome.js"> </script>
    
</body>
</html>