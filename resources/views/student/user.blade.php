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
    <title>Oikos Student: User Info</title>

</head>
<body>
    @include('component.student.sidenav')   
    <div class="main-content">
        <h1>User Info</h1>
        <div class="container">
            <!-- Container for Student details -->
            <div class="employee-container">
                <h3 id=container-title>Student Details</h3>
                <div class="field-group">
                    <div class="input-group">
                        <input type="text" class='input-field' id='last-name' value="Field" readonly>
                        <label for="last-name">Last Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class='input-field' id='first-name' value="Beatrice Ashley" readonly >
                        <label for="first-name">First Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class='input-field' id='middle-name' value="Reyes" readonly >
                        <label for="middle-name">Midde Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class='input-field' id='extension' value="" readonly >
                        <label for="extension">Extension</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="input-group">
                        <input type="date" class='input-field' id='birthdate' value="August-20-2001" readonly >
                        <label for="birthdate">Birthdate</label>
                    </div>
                    <div class="input-group-special">
                        <input type="text" class='input-field' id='phone-number' value="09154054370" readonly >
                        <label for="phone-number">Phone Number</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="input-group-single">
                        <input type="text" class='input-field' id='address' value="1 Riyal Street CBE Town Brgy Pasong Tamo Quezon City" readonly >
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="input-group">
                        <input type="text" class='input-field' id='city' value="Quezon City" readonly >
                        <label for="city">City</label>
                    </div>
                    <div class="input-group-special">
                        <input type="text" class='input-field' id='region' value="NCR" readonly >
                        <label for="region">Region</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class='input-field' id='postal' value="1101" readonly >
                        <label for="postal">Postal Code</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="input-group">
                        <input type="text" class='input-field' id='country' value="Philppines" readonly >
                        <label for="country">Country</label>
                    </div>
                    <div class="input-group-special">
                        <input type="text" class='input-field' id='nationality' value="Russian" readonly >
                        <label for="nationality">Nationality</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class='input-field' id='sex' value="Male" readonly >
                        <label for="sex">Sex</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="input-group-special">
                        <input type="text" class='input-field' id='email' value="lupinIII@gmail.com" readonly >
                        <label for="email">Email</label>
                    </div>
                    <div class="input-group-special">
                        <input type="text" class='input-field' id='telephone' value="N/A" readonly >
                        <label for="telephone">Telephone Number</label>
                    </div>
                </div>
            </div>


    <script src="/JS/Student/studentUser.js"> </script>

</body>
</html>