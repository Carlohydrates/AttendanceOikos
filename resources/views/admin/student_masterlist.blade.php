<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/admin.css">
    <link rel="stylesheet" href="/CSS/studentMasterlist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Admin: Student Master List</title>
    <style>
        .input-group input {
            padding: 0.35rem;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 1rem;
            width: 100%;
        }
    </style>
</head>
<body>
    @include('component.admin.sidenav')
    <div class="main-content">
        <h1>Student Master List</h1>
        <button class="add-student-btn" onclick="showStudentModal()">+ Add a Student</button>
        <button class="add-section-btn" onclick="showAddSectionModal()">+ Add Grade Level/Section</button>        
        <button class="rem-btn" onclick="showRemoveModal()">- Remove Grade Level/Section</button>
            <div class="std-log-container">
                <div class="header-std-list"><h2>Student List</h2>
                    <div class="std-filter-container">
                        <div class="search-table-container">
                            <div class="std-search-container">
                                <input type="text" id="search" size="30" placeholder="Search a Student..." oninput="applyFilter()">
                                <input type="text" id="search-section" size="30" placeholder="Search a Section..." oninput="applySectionFilter()">
                                <input type="text" id="search-grade-level" size="30" placeholder="Search a Grade Level..." oninput="applyGradeLevelFilter()">
                            </div>
                        </div>
                    </div>
                <table class="std-attendance-type" style="width: 100%;">    
                    <thead>
                        <tr>
                            <th>QR</th>
                            <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByID()"></i></button>ID</th>
                            <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByName()"></i></button>Name</th>
                            <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnByDate()"></i></button>Date Enrolled</th>
                            <th><button><i class="fa-solid fa-filter" onclick="sortColumnByLevel()"></i></button>Grade Level</th>
                            <th><button><i class="fa-solid fa-arrow-down-wide-short" onclick="sortColumnBySection()"></i></button>Section</th>
                            <th><button><i class="fa-solid fa-filter" onclick="sortColumnByStatus()"></i></button>Status</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="logTableBody">
                        @forEach ($Students as $Student)
                            <tr>
                                <td>
                                    {!! QrCode::size(60)->generate($Student->qr) !!}
                                </td>
                                <td>{{$Student->student_id}}</td>
                                <td>{{$Student->fname ." ".$Student->mname ." ".$Student->lname}}</td>
                                <td>{{$Student->date_enrolled}}</td>
                                <td>{{$Student->level}}</td>
                                <td>{{$Student->section}}</td>
                                <td>{{$Student->enroll_status}}</td>
                                <td>
                                    <button class="action-btn" id="stud-action-btn" onclick="retrieveData({{$Student->student_id}})"><i class="fa-solid fa-pencil"></i></button>
                                </td>
                            </tr>
                        @endforEach
                    </tbody>
                </table>
            </div>
            <div class="container"></div>
    </div>
    <div id="remove-modal" class="modal-mask hidden">
        <div class="form-container-add">
            <div class="form-group-add">
                <div class="input-group-add">
                    <h3>Remove Grade Levels/Sections</h3>
                    <br>
                    <label for="remove-grade-level-dropdown">Select Grade Level</label>
                    <select id="remove-grade-level" class="select-input" onchange="getSections('remove-grade-level', 'remove-section')">
                    </select>
                    <br><br>
                    <label for="remove-section-dropdown">Select Section</label>
                    <select id="remove-section" class="select-input" required>
                    </select>
                </div>
            </div>
            <div class="button-container">
                <button id="confirm-remove-btn" onclick ="removeGradeLevelAndSection()">Remove</button>
                <button id="cancel-remove-btn" onclick ="hideRemoveModal()">Cancel</button>
            </div>
        </div>
    </div>    
    <div id="add-section-modal" class="modal-mask hidden">
        <div class="form-container-add">
            <form id="form-content-add">
                <div class="form-group-add">
                    <div class="input-group-add">
                        <h3>Add Grade Level/Section</h3>
                        <br>
                        <label for="select-grade-level">Select a Grade level</label>
                        <select id="select-grade-level" class="select-input">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <br><br>
                        <label for="new-section">Enter the new Section:</label>
                        <input type="text" id="new-section" class="input-field" required>
                    </div>
                </div>
                <div class="button-container">
                    <button onclick="addGradeLevel(event)" class = "btn-submit-grade">Add Section</button>
                    <button class="cancel" onclick="hideAddSectionModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <div id="student-modal" class="modal-mask hidden">
        <div class="form-container">
            <div class="form-header"><h2>Add Student</h2><i class="far fa-times-circle" onclick ="hideStudentModal()" style="font-size:1.3rem;cursor:pointer;"></i></div>
            <form id="form-content">
                <div class="input-row">
                    <div class="input-column">
                        <div class="input-group-special">
                                <label for="first-name">First Name</label>
                                <input type="text" class='input-field' id='first-name' required>
                        </div>
                        <div class="input-group-special">
                                <label for="middle-name">Middle Name</label>
                                <input type="text" class='input-field' id='middle-name' required>
                        </div>
                        <div class="input-group-special">
                                <label for="last-name">Last Name</label>
                                <input type="text" class='input-field' id='last-name' required>
                        </div>
                        <div class="input-group-special">
                                <label for="extension">Suffix</label>
                                <input type="text" class='input-field' id='extension'>
                        </div>
                        <div class="input-group-special">
                            <label for="sex">Sex</label>
                            <select id="sex" class="select-input" required>
                                <option value="null">---</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="input-group-special">
                            <label for="telephone-number">Telephone Number</label>
                            <input type="text" class='input-field' id='telephone-number' required>
                        </div>
                        <div class="input-group-special">
                            <label for="mobile-number">Mobile Number</label>
                            <input type="text" class='input-field' id='mobile-number' required>
                        </div>
                        <div class="input-group-special">
                            <label for="nationality">Nationality</label>
                            <input type="text" class='input-field' id='nationality' required>
                        </div>
                        <div class="input-group-special">
                                <label for="birthday">Birthdate</label>
                                <input type="date" id='birthday' required>
                        </div>
                        <div class="input-group-special">
                            <label for="age">Age</label>
                            <input type="number" id='age' name="age" required min = "0">
                    </div>
                        
                    
                </div>
                    <div class="input-column">
                        <div class="input-group-special">
                            <label for="fetcher">Fetcher</label>
                            <input type="text" class='input-field' id='fetch' required>
                        </div>
                            <div class="input-group-special">
                                <label for="address">Address</label>
                                <input type="text" class='input-field' id='address' required>
                            </div>
                            <div class="input-group-special">
                                <label for="city">City</label>
                                <input type="text" class='input-field' id='city' required>
                            </div>
                            <div class="input-group-special">
                                <label for="region">Region</label>
                                <input type="text" class='input-field' id='region' required>
                            </div>
                            <div class="input-group-special">
                                <label for="postal-code">Postal Code</label>
                                <input type="text" class='input-field' id='postal-code' required>
                            </div>
                            <div class="input-group-special">
                                <label for="country">Country</label>
                                <input type="text" class='input-field' id='country' required>
                            </div>
                            <div class="input-group-special">
                                <label for="enroll-status">Enrollment Status</label>
                                <select id="enroll-status" class="select_input" required>
                                    <option value="null">---</option>
                                    <option value="Enrolled">Enrolled</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="input-group-special">
                                <label for="grade-level">Grade Level</label>
                                <select id="grade-level" class="select-input" required onchange="getSections('grade-level', 'section')">
                                    
                                </select>
                            </div>
                            <div class="input-group-special">
                                <label for="section" >Section</label>
                                <select id="section" class="select-input" required>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                <br><br>
                <div class="submit-group">
                    <button onclick = "addStudent(event)" class="btn-submit">Add</button>
                    <button class="btn-cancel" onclick ="hideStudentModal()">Cancel</button>
                    <button class="btn-import" onclick="excelOpen(event)">Import</button>
                </div>

            </form>
            <div class="form-import" id="import">
                <button class="close" onclick="excelclose(event)" style="float:right;"><i class="fa-solid fa-xmark"></i></button>
                <div class="import-area">
                    <h2>Upload Multiple Students</h2>
                    <br>
                    <input type="file" id="upload-file" name="Import file" accept=".xlsx, .xls, .cvs" required>
                    <br>
                    <button class="btn-import" id="upload-btn" onclick = "uploadMultipleStudents(event)"> Upload </button>
                    <br>
                </div>
                <div class="import-area">
                    
                </div>
            </div>
        </div>
    </div>

    {{-- ACTION BUTTON MODAL --}}
    <div class="eml-modal-mask hidden">
        <div class="eml-form-container">
            <div class="eml-details">
                <div class="emp-icon">
                    <img src="../assets/testpic.png" alt="student icon" class="emp-img">
                </div>
                <div class="emp-name" id = "studentName">
                    
                    <br>
                    <i>Student</i>
                </div>
                <div class="emp-status">
                    <button class="status-btn">
                        Status
                    </button>
                </div>
                <div class="emp-role">
                    <button class="role-btn">
                        Grade Level & Section
                    </button>
                </div>
                <div class="emp-info">
                    <button class="info-btn">
                        Info
                    </button>
                </div>

                <template id="your-template">
                    <swal-title>
                      Are you sure you want to Delete this Student?
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
                <i class="far fa-times-circle" id="action-modal-close" style="font-size:1.5rem;cursor:pointer;"></i>
            </div>
        </div>
    </div>

    <script src = "/JS/Admin/studentMasterlist.js"></script>
    <script src = "/JS/Admin/addStudent.js"></script>
    <script src="/JS/Admin/addGradeSection.js"></script>
    <script src="/JS/navevent.js"></script>
</body>
</html>