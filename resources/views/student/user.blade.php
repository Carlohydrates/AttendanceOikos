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
                @foreach($student_data as $data)
                    <div class="field-group">
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='last-name' value="{{$data->lname}}" readonly>
                            <label for="last-name">Last Name</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='first-name' value="{{$data->fname}}" readonly >
                            <label for="first-name">First Name</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='middle-name' value="{{$data->mname}}" readonly >
                            <label for="middle-name">Midde Name</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='extension' value="{{$data->extension}}" readonly >
                            <label for="extension">Extension</label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="input-group-special">
                            <input type="date" class='input-field' id='birthdate' value="{{$data->bday}}" readonly >
                            <label for="birthdate">Birthdate</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='phone-number' value="{{$data->telephone_number}}" readonly >
                            <label for="phone-number">Phone Number</label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="input-group-single">
                            <input type="text" class='input-field' id='address' value="{{$data->address}}" readonly >
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='city' value="{{$data->city}}" readonly >
                            <label for="city">City</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='region' value="{{$data->region}}" readonly >
                            <label for="region">Region</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='postal' value="{{$data->postal_code}}" readonly >
                            <label for="postal">Postal Code</label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='country' value="{{$data->country}}" readonly >
                            <label for="country">Country</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='nationality' value="{{$data->nationality}}" readonly >
                            <label for="nationality">Nationality</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='sex' value="{{$data->sex==1?'Male':'Female'}}" readonly >
                            <label for="sex">Sex</label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='email' value="{{$data->email}}" readonly >
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='telephone' value="{{$data->mobile_number}}" readonly >
                            <label for="telephone">Telephone Number</label>
                        </div>
                    </div>
                @endforeach 
            </div>
    <script src="/JS/Student/studentUser.js"> </script>
    <script src="/JS/logout.js"></script>
</body>
</html>