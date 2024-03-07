<div class="container-emp-list">
        <div class="employee-list">
                <div class="header-emp-list">
                    <h3>Employee List</h3>
                <div class="search-emp-list">
                    <input type="text" id="search-bar" size="30" placeholder="Search..." oninput="applyFilter()">
                </div>
                    <table class="emp-masterlist" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><button><i class="fa-solid fa-arrow-down-wide-short" ></i></button> QR</th>
                                <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByID()" ></i></button> ID</th>
                                <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByName()"></i></button> Name</th>
                                <th><button><i class="fa-solid fa-filter" onclick="sortColumnByRole()"></i></button> Role</th>
                                <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByDate()"></i></button> Date</th>
                                <th><button><i class="fa-solid fa-filter" onclick="sortColumnByStatus()"></i></button> Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="emp-masterlist-body" >
                            @foreach($employees as $employee)
                            <tr>
                                <td>
                                    {!! QrCode::size(60)->generate($employee->qr) !!}
                                </td>
                                <td>{{$employee->employee_id}}</td>
                                <td>{{$employee->fname. " ".$employee ->minitial." ".$employee ->lname}}</td>
                                @if($employee->position=="T")
                                    <td>Teacher</td>
                                @elseif($employee->position=="IT")
                                    <td>IT</td>
                                @else
                                    <td>Admin</td>
                                @endif
                                <td>{{$employee->date_employed}}</td>
                                <td style="color:{{$employee->status=="Inactive"?'red':'green'}}">{{($employee ->status)}}</td>
                                <td><button onclick="retrieve_data({{$employee -> employee_id}})"><i class="fa-solid fa-pencil"></i></button></td>
                            </tr>
                            @endforEach
                        </tbody>
                    </table>
                </div>
            </div>

        <div class="eml-modal-mask hidden">
            <div class="eml-form-container">
                <div class="eml-details">
                    <div class="emp-icon">
                        <img src="../assets/testpic.png" alt="emp icon" class="emp-img">
                    </div>
                    <div class="emp-name">
                    </div>
                    <div class="emp-status">
                        <button class="status-btn">
                            Status
                        </button>
                    </div>
                    <div class="emp-role">
                        <button class="role-btn">
                            Role
                        </button>
                    </div>
                    <div class="emp-info">
                        <button class="info-btn">
                            Info
                        </button>
                    </div>
                    
                    <template id="my-template">
                        <swal-title>
                          Are you sure you want to Delete this Employee?
                        </swal-title>
                        <swal-icon type="warning" color="red"></swal-icon>
                        <swal-button type="confirm" color="red">
                          DELETE
                        </swal-button>
                        <swal-button type="cancel">
                          Cancel
                        </swal-button>
                        <swal-param name="allowEscapeKey" value="false" />
                        <swal-param
                          name="customClass"
                          value='{ "popup": "my-popup" }' />
                        <swal-function-param
                          name="didOpen"
                          value="popup => console.log(popup)" />
                      </template>
                      <div class="emp-action">
                        <button onclick="openSweetAlert()" class="delete"><i class="fa-solid fa-trash"></i><br>Delete</button> 
                      </div>  
                </div>
                <div class="eml-selection">
                </div>
                <div class="eml-modal-close">
                    <i class="far fa-times-circle" style="font-size:1.5rem;cursor:pointer;"></i>
                </div>
            </div>
        </div>


        <script>

function openSweetAlert() {
        Swal.fire({
            template: "#my-template"
            
        }).then((result) => {
        if (result.isConfirmed) {
            fetch('/delete-employee',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-Token':csrf.content,
                },
                body:JSON.stringify({id:employee_id})
                })
                .then(response=>response.json())
                .then(data=>{
                    if(data.success){
                        location.reload();
                    }
                })
                .catch(error=>{
                    console.log("Error deleting events ",error);
                })
            }
    });
    }
            function applyFilter() {
    var searchValue = document.getElementById('search-bar').value.toLowerCase();
    var tableBody = document.getElementById('emp-masterlist-body');
    var rows = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var searchCells = rows[i].getElementsByTagName('td');
        var found = false;

        for (var j = 0; j < searchCells.length; j++) {
            var cellContent = searchCells[j].textContent.toLowerCase();

            if (cellContent.includes(searchValue)) {
                found = true;
                break;
            }
        }

        if (found) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

      
        let showModal = document.querySelector('.eml-modal-mask');
        let closeModal = document.querySelector('.far');
        let select = document.querySelector('select');
        var employee_id = 0;
        
        
        closeModal.onclick=()=>{
            showModal.classList.toggle('hidden');
        }

        function retrieve_data(id){
            employee_id = id;
            console.log("hello world");
            fetch("/retrieve-employee",{
                method: 'POST',
                headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
                body:JSON.stringify({user_id:id})
            })
            .then(response=>response.json())
            .then(data =>{
                if(data.success){
                    var user_instance = data.user_data;
                    let emlSelection = document.querySelector('.eml-selection');
                    let statusButton = document.querySelector('.status-btn');
                    console.log(user_instance[0].employee_id);

                    showModal.classList.remove('hidden')
                    
                    showEmployeeData(user_instance[0]);

                    statusButton.addEventListener('click', function() {
                        emlSelection.innerHTML = `
                        <h2>Edit Status</h2>
                        <label for="select-status" >Status</label>
                        <select id="select-status" class="selection"> 
                            <option value="Inactive" ${user_instance[0].status === 'Inactive' ? 'selected' : ''}> Inactive </option>
                            <option value="Active" ${user_instance[0].status === 'Active' ? 'selected' : ''}> Active </option>
                        </select>
                        <button class="btn-save" onclick="updatestatus(event,${user_instance[0].employee_id})">Save Status</button>
                    `;})
                }
            })
            .catch(error =>{
                console.log('Error! Employee data did not submit.',error);
            })
        }

        function showEmployeeData (user_instance) {
            let roleButton = document.querySelector('.role-btn');
            let infoButton = document.querySelector('.info-btn');
            let statusButton = document.querySelector('.status-btn');
            let emlSelection = document.querySelector('.eml-selection');

            emlSelection.innerHTML = `
                <h2>Edit Status</h2>
                <label for="select-status" >Status</label>
                <select id="select-status" class="selection"> 
                    <option value="Inactive" ${user_instance.status === 'Inactive' ? 'selected' : ''}> Inactive </option>
                    <option value="Active" ${user_instance.status === 'Active' ? 'selected' : ''}> Active </option>
                </select>
                <button class="btn-save" onclick="updatestatus(event,${user_instance.employee_id})">Save Status</button>`;

            roleButton.addEventListener('click', function() {
                emlSelection.innerHTML = `
                    <h2>Edit Role</h2>
                    <label for="select-role">Role</label>
                    <select id="select-role" class="selection">
                        <option value="none" selected disabled hidden>Select an Option</option> 
                        <option value="T" ${user_instance.position === 'T' ? 'selected' : ''}>Teacher</option>
                        <option value="IT" ${user_instance.position === 'IT' ? 'selected' : ''}>IT</option>
                        <option value="A" ${user_instance.position === 'A' ? 'selected' : ''}>Admin</option>
                    </select>
                    <button class="btn-save" onclick="updaterole(event,${user_instance.employee_id})">Save Role</button>
            `;})

            infoButton.addEventListener('click', function() {
                emlSelection.innerHTML = `
                    <form>
                        <h2>Edit Information</h2>
                            <div class="input-row">
                                <div class="input-column">
                                    <div class="input-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="firstName" value="${user_instance.fname}" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" id="middleName" name="middleName" value="${user_instance.minitial}">
                                    </div>
                                    <div class="input-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="lastName" value="${user_instance.lname}" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="extendName">Extension</label>
                                        <input type="text" id="extendName" name="extendName" value="${user_instance.extension}" required>
                                    </div>
                                    </div>

                                    <div class="input-column">
                                    <div class="input-group">
                                        <label for="age">Age</label>
                                        <input type="number" id="age" name="age" value="${user_instance.age}" required min="0">
                                    </div>
                                    <div class="input-group">
                                        <label for="sex">Sex</label>
                                        <select id="sex" name="Sex" required>
                                            <option value="male" ${user_instance.sex === 'male' ? 'selected' : ''}>Male</option>
                                            <option value="female" ${user_instance.sex === 'female' ? 'selected' : ''}>Female</option>
                                            <option value="other" ${user_instance.sex === 'other' ? 'selected' : ''}>Other</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="TelNumber">Telephone Number</label>
                                        <input type="text" id="TelNumber" name="TelNumber" value="${user_instance.telephone_number}" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" id="phoneNumber" name="phoneNumber" value="${user_instance.phone_number}" required>
                                    </div>
                                </div>
                                <div class="input-column">
                                    <div class="input-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"value="${user_instance.email}"required>
                                    </div>
                                    <div class="input-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" value="${user_instance.address} "required>
                                    </div>
                                    <div class="input-group">
                                        <label for="City">City</label>
                                    <input type="text" id="cityName" name="CityName" value="${user_instance.city}" required>
                                </div>
                                <div class="input-group">
                                    <label for="postalNumber">Postal Code</label>
                                    <input type="text" id="postalNumber" name="postalNumber" value="${user_instance.postal_code}" required>
                                </div>
                                </div>
                                <div class="input-column">
                                <div class="input-group">
                                    <label for="Region">Region</label>
                                    <input type="text" id="regionName" name="RegionName" value="${user_instance.region}" required>
                                </div>
                                <div class="input-group">
                                    <label for="countryName">Country</label>
                                    <input type="text" id="countryName" name="countryName" value="${user_instance.country}" required>
                                </div>
                                <div class="input-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" id="nationality" name="nationality" value="${user_instance.nationality}" required>
                                </div>
                                <div class="input-column">
                                    <div class="input-group">
                                        <label for="Birthday">Birthdate</label>
                                        <input type="date" id="birthday" name="birthday" value="${user_instance.bday}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-save" onclick="updateemployee(event,${user_instance.employee_id})">Save Edit</button>
                    </form>`;

                    let newCloseModal = document.querySelector('.far');
                    newCloseModal.addEventListener('click', function() {
                        showModal.classList.add('hidden');
                    });
            })
        }
        
        function updateemployee(event,employee_id){
            event.preventDefault();
            const employee={
                id:employee_id,
                firstName:document.getElementById('firstName').value,
                middleName:document.getElementById('middleName').value,
                lastName:document.getElementById('lastName').value,
                extendName:document.getElementById('extendName').value,
                age:document.getElementById('age').value,
                sex:document.getElementById('sex').value,
                TelNumber:document.getElementById('TelNumber').value,
                phoneNumber:document.getElementById('phoneNumber').value,
                email:document.getElementById('email').value,
                address:document.getElementById('address').value,
                cityName:document.getElementById('cityName').value,
                postalNumber:document.getElementById('postalNumber').value,
                regionName:document.getElementById('regionName').value,
                countryName:document.getElementById('countryName').value,
                nationality:document.getElementById('nationality').value,
                birthday:document.getElementById('birthday').value
            };
                fetch("/update-employee",{
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
                    console.log('Error! Employee data did not update.',error);
                })
            }
            
            function updatestatus(event, employee_id) {
            event.preventDefault();
            const employee = {
                id: employee_id,
                'select-status': document.getElementById('select-status').value
            };
            fetch("/status_update-employee", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': csrf.content
                    },
                    body: JSON.stringify(employee)

                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.log('Error! Status did not update', error);
                })
        }

       
        function updaterole(event, employee_id){
            event.preventDefault();
            const employee = {
                id: employee_id,
                'select-role': document.getElementById('select-role').value
            };
            fetch("/role_update-employee",{
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                    'X-CSRF-Token':csrf.content
                },
                body: JSON.stringify(employee)
            })
            .then(response=> response.json())
            .then(data =>{
                if (data.success){
                    location.reload();
                }
            })
            .catch(error => {
                console.log('Error! Role did not update', error);
            })
        }


        
        
            let sortDirectionID = 1;
            let sortDirectionName = 1;
            let sortDirectionRole = 1;
            let sortDirectionDate = 1; 
            let sortDirectionStatus = 1; 
            function sortColumnByID() {
                const tbody = document.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const sortedRows = rows.sort((a, b) => {
                    const aValue = parseInt(a.children[1].innerText); // Convert text to integer for numeric comparison
                    const bValue = parseInt(b.children[1].innerText);
                    
                    return sortDirectionID * (aValue - bValue); // Compare numeric values
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                sortedRows.forEach(row => tbody.appendChild(row));

                sortDirectionID *= -1; // Update the sorting direction

                const sortIcon = document.querySelector('.sort-button i:nth-child(2)'); // Update the icon selector
                sortIcon.classList.remove('fa-sort-up', 'fa-sort-down');
                if (sortDirectionID === 1) {
                    sortIcon.classList.add('fa-sort-up');
                } else {
                    sortIcon.classList.add('fa-sort-down');
                }
            }

            function sortColumnByName() {
                const tbody = document.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const sortedRows = rows.sort((a, b) => {
                    const aValue = a.children[2].innerText;
                    const bValue = b.children[2].innerText;
                    
                    return sortDirectionName * aValue.localeCompare(bValue, undefined, {numeric: true});
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                sortedRows.forEach(row => tbody.appendChild(row));

                sortDirectionName *= -1; // Update the sorting direction
                const sortIcon = document.getElementById('sort-icon-name');
                if (sortDirectionName === 1) {
                    sortIcon.classList.remove('fa-sort-alpha-down');
                    sortIcon.classList.add('fa-sort-alpha-up');
                } else {
                    sortIcon.classList.remove('fa-sort-alpha-up');
                    sortIcon.classList.add('fa-sort-alpha-down');
                }

            }

            function sortColumnByRole() {
                const tbody = document.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const sortedRows = rows.sort((a, b) => {
                    const aValue = a.children[3].innerText;
                    const bValue = b.children[3].innerText;
                    
                    return sortDirectionName * aValue.localeCompare(bValue, undefined, {numeric: true});
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                sortedRows.forEach(row => tbody.appendChild(row));

                sortDirectionName *= -1; // Update the sorting direction
                const sortIcon = document.getElementById('sort-icon-name');
                if (sortDirectionName === 1) {
                    sortIcon.classList.remove('fa-sort-alpha-down');
                    sortIcon.classList.add('fa-sort-alpha-up');
                } else {
                    sortIcon.classList.remove('fa-sort-alpha-up');
                    sortIcon.classList.add('fa-sort-alpha-down');
                }

            }

            function sortColumnByDate() {
            const tbody = document.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sortedRows = rows.sort((a, b) => {
                const aValue = new Date(a.children[4].innerText);
                const bValue = new Date(b.children[4].innerText);
                
                return sortDirectionDate * (aValue - bValue);
            });

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }

            sortedRows.forEach(row => tbody.appendChild(row));

            sortDirectionDate *= -1;

            const sortIcon = document.querySelector('.sort-button i:nth-child(3)');
            sortIcon.classList.remove('fa-sort-up', 'fa-sort-down');
            if (sortDirectionDate === 1) {
                sortIcon.classList.add('fa-sort-up');
            } else {
                sortIcon.classList.add('fa-sort-down');
            }
        }
            function sortColumnByStatus() {
            const tbody = document.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sortedRows = rows.sort((a, b) => {
                const aValue = a.children[5].innerText;
                const bValue = b.children[5].innerText;
                
                return sortDirectionStatus * aValue.localeCompare(bValue);
            });

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }

            sortedRows.forEach(row => tbody.appendChild(row));

            sortDirectionStatus *= -1;

            const sortIcon = document.querySelector('.sort-button i:nth-child(7)');
            sortIcon.classList.remove('fa-sort-up', 'fa-sort-down');
            if (sortDirectionStatus === 1) {
                sortIcon.classList.add('fa-sort-up');
            } else {
                sortIcon.classList.add('fa-sort-down');
            }
        }
        </script>