<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets/Oikos Logo.png">
    <link rel="stylesheet" href="/CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- implemented sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Admin: Employee Masterlist</title>

    <style>
        .add-emp-btn {
            font-size: 1em;
            font: sans-serif;
            padding: 10px;
            background-color: #323468;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1em;
            margin-bottom: 1em;
        }
        .add-emp-btn:hover {
            opacity: 85%;
            cursor: pointer;
        }

        .modal-mask {
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            z-index: 100;
            background-color: rgba(0, 0, 0, 0.534);
            opacity: 1;
            transition: opacity 200ms ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-emp-container {
            position: relative;
            background-color: white;
            border-radius: 10px;
            width: 60%;
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }

        .add-emp-container h2 {
            margin-bottom: 2rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group input,
        .input-group select {
            padding: 0.5rem;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 1rem;
            margin-bottom: .5rem;
            width: 100%;
        }

        .input-row {
            display: flex;
            width: 100%;
        }

        .input-column {
            flex: 1;
            margin-right: 1rem;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
        }

        .btn-submit, .btn-clear {
            margin-top: 1rem;
            margin-right: 1rem;
            width: 15%;
            background-color: #323468;
            color: #fff;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-submit:hover, .btn-clear:hover {
            opacity: 0.8;
        }

        .modal-close-btn {
            display: flex;
            padding: 10px;
        }

        .modal-close-btn .far {
            position: absolute;
            top: 20px;
            right: 20px; 
        }
    </style>

</head>
<body>
    @include('component.admin.sidenav')
    <div class="main-content">
        <h1>Employee Master List</h1>
        <button class="add-emp-btn">+ Add Employee</button>
        @include('component.admin.emp_masterlist_component')
        <div class="container">
        </div>
    </div>

<!--
Things needed
extension(Done)
Phone Number (Done)
Telephone Number(Done)
City (Done)
Region (Done)
Postal Code (Done)
Country (Done)
nationality (Done)

Change Gender to Sex (done)

-->
    <div class="modal-mask hidden">
        <div class="add-emp-container">
            <h2>Add Employee</h2>
            <form id="addEmployeeForm">
                <div class="input-row">
                    <div class="input-column">
                        <div class="input-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="input-group">
                            <label for="middleName">Middle Name</label>
                            <input type="text" id="middleName" name="middleName">
                        </div>
                        <div class="input-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                        <div class="input-group">
                            <label for="extendName">Extension</label>
                            <input type="text" id="extendName" name="extendName" required>
                        </div>
                        <div class="input-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" required min="0">
                        </div>
                        <div class="input-group">
                            <label for="sex">Sex</label>
                            <select id="sex" name="Sex" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="TelNumber">Telephone Number</label>
                            <input type="text" id="TelNumber" name="TelNumber" required>
                        </div>
                        <div class="input-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <div class="input-column">
                            <div class="input-group">
                                <label for="Birthday">Birthdate</label>
                                <input type="date" id="birthday" name="birthday" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-column">
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <div class="input-group">
                            <label for="City">City</label>
                            <input type="text" id="cityName" name="CityName" required>
                        </div>
                        <div class="input-group">
                            <label for="postalNumber">Postal Code</label>
                            <input type="text" id="postalNumber" name="postalNumber" required>
                        </div>
                        <div class="input-group">
                            <label for="Region">Region</label>
                            <input type="text" id="regionName" name="RegionName" required>
                        </div>
                        <div class="input-group">
                            <label for="countryName">Country</label>
                            <input type="text" id="countryName" name="countryName" required>
                        </div>
                        <div class="input-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality" required>
                        </div>
                        
                        <div class="input-group">
                            <label for="position">Position</label>
                            <select id="position" name="position" required>
                                <option value="T">Teacher</option>
                                <option value="A">Admin</option>
                                <option value="IT">IT</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="select-status">Status</label>
                            <select id="select-status" name="select-status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button type="button" class="btn-clear">Clear</button>
                    <button onclick= "addemployee(event)" class="btn-submit">Submit</button>
                </div>
            </form>
            <div class="modal-close-btn">
                <i class="far fa-times-circle" style="font-size:1.5rem;cursor:pointer;"></i>
            </div>
        </div>
    </div>

    <script>
        let addEmpBtn = document.querySelector('.add-emp-btn');
        let modalMask = document.querySelector('.modal-mask');
        let closeBtn = document.querySelector('.modal-close-btn');
        closeBtn.onclick = () => {
            modalMask.classList.add('hidden');
        }
        addEmpBtn.onclick = () => {
            modalMask.classList.remove('hidden');
        }
        let clearBtn = document.querySelector('.btn-clear');
        clearBtn.onclick = () => {
            // Select all input elements within the form and clear their values
            document.querySelectorAll('#addEmployeeForm input').forEach(input => input.value = '');
            // Select all select elements within the form and reset them to their default value
            document.querySelectorAll('#addEmployeeForm select').forEach(select => select.value = select.querySelector('option').value);
        }
        let addEmployeeForm = document.getElementById('addEmployeeForm');
        addEmployeeForm.addEventListener('submit', function(event) {
            event.preventDefault();
            console.log('Form submitted');
            modalMask.classList.add('hidden');
        });

        
        const csrf = document.querySelector("meta[name='csrf-token']")
        function addemployee(event){
            event.preventDefault();
            const employee={
                firstName:document.getElementById('firstName').value,
                middleName:document.getElementById('middleName').value,
                email:document.getElementById('email').value,
                lastName:document.getElementById('lastName').value,
                extendName:document.getElementById('extendName').value,
                address:document.getElementById('address').value,
                phoneNumber:document.getElementById('phoneNumber').value,
                TelNumber:document.getElementById('TelNumber').value,
                age:document.getElementById('age').value,
                cityName:document.getElementById('cityName').value,
                regionName:document.getElementById('regionName').value,
                postalNumber:document.getElementById('postalNumber').value,
                countryName:document.getElementById('countryName').value,
                nationality:document.getElementById('nationality').value,
                birthday:document.getElementById('birthday').value,
                sex:document.getElementById('sex').value,
                position:document.getElementById('position').value
            };
            fetch("/add-employee",{
                method: 'POST',
                headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
                body:JSON.stringify(employee)
            })
            .then(response=>response.json())
            .then(data =>{
                if(data.success){
                    location.reload();
                }
            })
            .catch(error =>{
                console.log('Error! Employee data did not submit.',error);
            })
        }

    </script>
    <script src="/JS/navevent.js"></script>

</body>
</html>