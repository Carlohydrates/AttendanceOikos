
        let toggleActionModals = document.querySelectorAll('.action-btn');
        let showActionModal = document.querySelector('.eml-modal-mask');
        let closeActionModal = document.querySelector('#action-modal-close');

        closeActionModal.onclick=()=>{
            showActionModal.classList.toggle('hidden');
        }

            document.addEventListener('DOMContentLoaded', function () {
                var tableBody = document.getElementById('logTableBody');
                var rows = tableBody.getElementsByTagName('tr');
                for (var i = 0; i < rows.length; i++) {
                    var statusCell = rows[i].querySelector('td:nth-child(7)');
                    if (statusCell.textContent.toLowerCase() === 'pending') {
                        statusCell.style.color = 'Orange';
                    } else if (statusCell.textContent.toLowerCase() === 'enrolled') {
                        statusCell.style.color = 'green';
                    } else {
                        statusCell.style.color = '';
                    }
                }

            });
            function applyFilter() {
                var searchValue = document.getElementById('search').value.toLowerCase();
                var tableBody = document.getElementById('logTableBody');
                var rows = tableBody.getElementsByTagName('tr');
        
                for (var i = 0; i < rows.length; i++) {
                    var searchCell = rows[i].querySelector('td:nth-child(3)').textContent.toLowerCase();
        
                    if (searchValue === '' || searchCell.includes(searchValue)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            function applyGradeLevelFilter() {
                var searchGradeLevelValue = document.getElementById('search-grade-level').value.toLowerCase();
                var tableBody = document.getElementById('logTableBody');
                var rows = tableBody.getElementsByTagName('tr');
            
                for (var i = 0; i < rows.length; i++) {
                    var gradeLevelCell = rows[i].querySelector('td:nth-child(5)').textContent.toLowerCase();
            
                    if (searchGradeLevelValue === '' || gradeLevelCell.includes(searchGradeLevelValue)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            function applySectionFilter() {
                var searchSectionValue = document.getElementById('search-section').value.toLowerCase();
                var tableBody = document.getElementById('logTableBody');
                var rows = tableBody.getElementsByTagName('tr');
            
                for (var i = 0; i < rows.length; i++) {
                    var sectionCell = rows[i].querySelector('td:nth-child(6)').textContent.toLowerCase();
            
                    if (searchSectionValue === '' || sectionCell.includes(searchSectionValue)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            let sortDirectionID = 1;
            let sortDirectionName = 1;
            let sortDirectionDate = 1;
            let sortDirectionLevel = 1;
            let sortDirectionSection = 1;
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
            function sortColumnByDate() {
            const tbody = document.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sortedRows = rows.sort((a, b) => {
                const aValue = new Date(a.children[3].innerText);
                const bValue = new Date(b.children[3].innerText);
                
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
            function sortColumnByLevel() {
                const tbody = document.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const sortedRows = rows.sort((a, b) => {
                    const aValue = extractNumericValue(a.children[4].innerText);
                    const bValue = extractNumericValue(b.children[4].innerText);
                    
                    return sortDirectionLevel * (aValue - bValue);
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                sortedRows.forEach(row => tbody.appendChild(row));

                sortDirectionLevel *= -1;

                const sortIcon = document.querySelectorAll('.sort-button i:nth-child(3)');
                sortIcon.forEach(icon => {
                    icon.classList.remove('fa-sort-up', 'fa-sort-down');
                    if (sortDirectionLevel === 1) {
                        icon.classList.add('fa-sort-up');
                    } else {
                        icon.classList.add('fa-sort-down');
                    }
                });
            }

            function sortColumnBySection() {
                const tbody = document.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const sortedRows = rows.sort((a, b) => {
                    const aValue = a.children[5].innerText;
                    const bValue = b.children[5].innerText;
                    
                    return sortDirectionSection * aValue.localeCompare(bValue, undefined, {numeric: true});
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                sortedRows.forEach(row => tbody.appendChild(row));

                sortDirectionSection *= -1;

                const sortIcon = document.querySelectorAll('.sort-button i:nth-child(4)');
                sortIcon.forEach(icon => {
                    icon.classList.remove('fa-sort-up', 'fa-sort-down');
                    if (sortDirectionSection === 1) {
                        icon.classList.add('fa-sort-up');
                    } else {
                        icon.classList.add('fa-sort-down');
                    }
                });
            }
            function sortColumnByStatus() {
            const tbody = document.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sortedRows = rows.sort((a, b) => {
                const aValue = a.children[6].innerText;
                const bValue = b.children[6].innerText;
                
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
            function extractNumericValue(level) {
                const matches = level.match(/\d+/);
                return matches ? parseInt(matches[0]) : 0;
        }
        let toggleModal=document.querySelector('.add-student-btn');
        let showModal=document.querySelector('.modal-mask');
        let select=document.querySelector('select');
        let gradeElement=document.getElementById('grade-level');
        
        function showStudentModal() {
            document.getElementById('student-modal').classList.remove('hidden');
        }
        function hideStudentModal() {
            document.getElementById('student-modal').classList.add('hidden');
        }

        function excelOpen(event){
            event.preventDefault();
            document.getElementById("import") .style.display ="block";
        }
        function excelclose(event){
            event.preventDefault();
            document.getElementById("import") .style.display ="none";
        }

        function excelOpen(event){
            event.preventDefault();
            document.getElementById("import") .style.display ="block";
        }
        function excelclose(event){
            event.preventDefault();
            document.getElementById("import") .style.display ="none";
        }

        function addGradeLevel() {
            showAddGradeModal();
        }

        function addSection() {
            showAddSectionModal();
        }

        function showRemoveModal() {
            populateRemoveDropdown();
            document.getElementById('remove-modal').classList.remove('hidden');
        }

        function hideRemoveModal() {
            document.getElementById('remove-modal').classList.add('hidden');
        }

        document.getElementById('cancel-remove-btn').addEventListener('click', hideRemoveModal);

        function showRemoveModal() {
            document.getElementById('remove-modal').classList.remove('hidden');
        }

        function hideRemoveModal() {
            document.getElementById('remove-modal').classList.add('hidden');
        }

        function showAddGradeModal() {
            document.getElementById('add-grade-modal').classList.remove('hidden');
        }

        function hideAddGradeModal() {
            document.getElementById('add-grade-modal').classList.add('hidden');
        }

        function showAddSectionModal() {
            document.getElementById('add-section-modal').classList.remove('hidden');
        }

        function hideAddSectionModal() {
            document.getElementById('add-section-modal').classList.add('hidden');
        }

        function openSweetAlert() {
            Swal.fire({
                template: "#your-template"
                
            }).then((result) => {
            if (result.isConfirmed) {
                fetch('/delete-student',{
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'X-CSRF-Token':csrf.content,
                    },
                    body:JSON.stringify({id:student_id})
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

        function retrieveData (id) {
            student_id = id;
            console.log(student_id);
            fetch(`/retrieve-student/${student_id}`, {
                method: 'GET',
                headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
            })
            .then(response=>response.json())
            .then(data=>{
                if(data.success) {
                    var user_instance = data.user_data;
                    let emlSelection = document.querySelector('.eml-selection');
                    let statusButton = document.querySelector('.status-btn');
                    console.log(user_instance[0]);

                    showActionModal.classList.remove('hidden');
                    showStudentData(user_instance[0]);

                    statusButton.addEventListener('click', function() {
                        emlSelection.innerHTML = `
                            <h2>Edit Status</h2>
                            <label for="select-status" >Status</label>
                            <select id="select-status" class="selection">
                                <option value="Pending" ${user_instance.enroll_status === 'Pending' ? 'selected' : ''}> Pending </option>
                                <option value="Enrolled" ${user_instance.enroll_status === 'Enrolled' ? 'selected' : ''}> Enrolled </option>
                            </select>
                            <button class="btn-save" onclick= "updateStatus(event,${user_instance.student_id})">Save</button>
                        `;})
                    }
                })
            .catch(error =>{
                console.log('Error! Employee data did not submit.',error);
            })
        }

        function showStudentData (user_instance) {
            let roleButton = document.querySelector('.role-btn');
            let infoButton = document.querySelector('.info-btn');
            let emlSelection = document.querySelector('.eml-selection');
            let statusButton = document.querySelector('.status-btn');
            fetchStudentName(student_id);

            emlSelection.innerHTML = `
                <h2>Edit Status</h2>
                <label for="select-status" >Status</label>
                <select id="select-status" class="selection">
                    <option value="Pending" ${user_instance.enroll_status === 'Pending' ? 'selected' : ''}> Pending </option>
                    <option value="Enrolled" ${user_instance.enroll_status === 'Enrolled' ? 'selected' : ''}> Enrolled </option>
                </select>
                <button class="btn-save" onclick= "updateStatus(event,${user_instance.student_id})">Save</button>`;

                roleButton.addEventListener('click', function() {
                    emlSelection.innerHTML = `
                    <h2>Edit Grade Level & Section</h2>
                    <label for="select-grade">Grade Level</label>
                    <select id="select-grade" value = "${user_instance.level}" class="selection" onchange = "getSections('select-grade', 'select-section')">      
                    </select>
                    <label for="select-section">Section</label>
                    <select id="select-section" class="selection">
                        <option value = "${user_instance.section}">${user_instance.section}</option>
                    </select>
                            
                    <button class="btn-save" onclick = "updateGradeAndSection(event,${user_instance.student_id})">Save</button>
                `;  getGradeLevels('select-grade', user_instance.level);
                })
                        
                infoButton.addEventListener('click', function() {
                    emlSelection.innerHTML = `
                    <form>
                        <h2>Edit Information</h2>
                        <div class="input-row">
                            <div class="input-column">
                                <div class="input-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class='input-field' id='firstName' value = "${user_instance.fname}" required>
                                </div>
                                <div class="input-group">
                                    <label for="middle-name">Middle Name</label>
                                    <input type="text" class='input-field' id='middleName' value = "${user_instance.mname}" required>
                                </div>
                                <div class="input-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class='input-field' id='lastName' value = "${user_instance.lname}" required>
                                </div>
                                <div class="input-group">
                                    <label for="extension">Suffix</label>
                                    <input type="text" class='input-field' id='extendName' value = "${user_instance.extension}">
                                </div>
                            </div>
                            <div class="input-column">
                                <div class="input-group">
                                    <label for="sex">Sex</label>
                                    <select id="studSex" class="select-input" required>
                                        <option value="male" ${user_instance.sex === 'male' ? 'selected' : ''}>Male</option>
                                        <option value="female" ${user_instance.sex === 'female' ? 'selected' : ''}>Female</option>
                                        <option value="other" ${user_instance.sex === 'other' ? 'selected' : ''}>Other</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="telephone-number">Telephone Number</label>
                                    <input type="text" class='input-field' id='telNumber' value = "${user_instance.telephone_number}" required>
                                </div>
                                <div class="input-group">
                                    <label for="mobile-number">Mobile Number</label>
                                    <input type="text" class='input-field' id='mobNumber' value = "${user_instance.mobile_number}" required>
                                </div>
                                <div class="input-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class='input-field' id='studNationality' value = "${user_instance.nationality}" required>
                                </div>
                            </div>
                            <div class="input-column">
                                <div class="input-group">
                                    <label for="birthday">Birthdate</label>
                                    <input type="date" id='studBirthday' value = "${user_instance.bday}" required>
                                </div>
                                <div class="input-group">
                                    <label for="age">Age</label>
                                    <input type="number" id='studAge' name="age" value = "${user_instance.age}" required min = "0">
                                </div>
                                <div class="input-group">
                                    <label for="fetcher">Fetcher</label>
                                    <input type="text" class='input-field' id='studFetch' value = "${user_instance.fetcher}" required>
                                </div>
                                <div class="input-group">
                                    <label for="address">Address</label>
                                    <input type="text" class='input-field' id='studAddress' value = "${user_instance.address}" required>
                                </div>
                            </div>
                            <div class="input-column">
                                <div class="input-group">
                                    <label for="city">City</label>
                                    <input type="text" class='input-field' id='studCity' value = "${user_instance.city}" required>
                                </div>
                                <div class="input-group">
                                    <label for="region">Region</label>
                                    <input type="text" class='input-field' id='studRegion' value = "${user_instance.region}" required>
                                </div>
                                <div class="input-group">
                                    <label for="postal-code">Postal Code</label>
                                    <input type="text" class='input-field' id='postalCode' value = "${user_instance.postal_code}" required>
                                </div>
                                <div class="input-group">
                                    <label for="country">Country</label>
                                    <input type="text" class='input-field' id='studCountry' value = "${user_instance.country}" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn-save" onclick="updateStudent(event,${user_instance.student_id})">Save Edit</button>
                    </form>`;
                    
                    let newCloseModal = document.querySelector('.far');
                    newCloseModal.addEventListener('click', function() {
                        showModal.classList.add('hidden');
                    });
                })
        }

        function fetchStudentName(studentId) {
            fetch(`/retrieve-student/${studentId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrf.content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const student = data.user_data[0];
                    const fullName = `${student.fname} ${student.mname} ${student.lname}`;
                    document.getElementById('studentName').textContent = fullName;
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function updateStudent(event,student_id){
            event.preventDefault();
            const student={
                id:student_id,
                firstName:document.getElementById('firstName').value,
                middleName:document.getElementById('middleName').value,
                lastName:document.getElementById('lastName').value,
                extension:document.getElementById('extendName').value,
                fetcher:document.getElementById('studFetch').value,
                age:document.getElementById('studAge').value,
                sex:document.getElementById('studSex').value,
                telephoneNumber:document.getElementById('telNumber').value,
                mobileNumber:document.getElementById('mobNumber').value,
                address:document.getElementById('studAddress').value,
                city:document.getElementById('studCity').value,
                postalCode:document.getElementById('postalCode').value,
                region:document.getElementById('studRegion').value,
                country:document.getElementById('studCountry').value,
                nationality:document.getElementById('studNationality').value,
                birthday:document.getElementById('studBirthday').value
            };
                fetch("/update-student",{
                    method: 'POST',
                    headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
                    body:JSON.stringify(student)
                })
                .then(response=>response.json())
                .then(data =>{
                    if(data.success){
                        location.reload();
                    }
                })
                .catch(error =>{
                    console.log('Error! Student data did not update.',error);
                })
            }

            function updateStatus(event, student_id) {
                event.preventDefault();
                const student = {
                    id: student_id,
                    'enroll_status': document.getElementById('select-status').value
                };
                fetch("/status-update-student", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrf.content
                        },
                        body: JSON.stringify(student)
    
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

            function updateGradeAndSection(event, student_id){
                event.preventDefault();
                const student = {
                    id: student_id,
                    'level': document.getElementById('select-grade').value,
                    'section': document.getElementById('select-section').value
                };
                fetch("/grade-update-student",{
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                        'X-CSRF-Token':csrf.content
                    },
                    body: JSON.stringify(student)
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

            function uploadMultipleStudents (event) {
                
                event.preventDefault();
                const fileInput = document.getElementById('upload-file');
        
                if (fileInput.files.length === 0) {
                    console.log('Please select a file');
                    return;
                }
        
                const formData= new FormData();
                formData.append('file', fileInput.files[0]);
        
                fetch('/upload-multiple-students', {
                    method: 'POST',
                    headers: {'X-CSRF-Token': csrf.content},
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Document Request added successfully:', data);
                    location.reload();
                })
                .catch(error => {
                    console.log('Error adding document request', error);
                });
            }