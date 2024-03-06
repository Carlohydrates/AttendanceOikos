<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Employee: Document Request</title>
    <style>
        .container{
            margin-top:.5em;
            background-color: rgba(255, 255, 255, 0);
            padding: 0.69em;
            display:flex;
            flex-direction:column;
        }
        #container-title{
            font-weight: 400;
            border-bottom:1px solid #dedede;
            color:#323468;
        }
        .transparent-table {
            border-collapse: collapse;
            width: 100%;
            background-color: rgba(255, 255, 255, 0);
        }
        table {
            border-collapse: collapse; 
        }
        th {
            border: 1px solid #dddddd;
            color: #fff;
            text-align: left;
            padding: 8px;
            background-color: #323468;
            width: 20em;
        }
        td {
            border: 1px solid rgba(255, 255, 255, 0);
            color: black;
            text-align: left;
            padding: 8px;
            background-color: rgba(255, 255, 255, 0);
            width: 20em;
        }
        .entries-container {
            padding: 0.5em;
            background-color: white;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pagination {
            margin-left: auto;
            display: flex;
            align-items: center;
            float: right;
        }
        .dropdown {
            margin: 0;
        }
        .dropdown select {
            border-radius: 25px;
            padding: 2.5px;
        }
        .arrow-btn {
            background-color: rgba(255, 255, 255, 0);
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 8px;
            margin: 0 5px;
        }
        .add-document-request-btn {
            font-size: 1em;
            font: sans-serif;
            padding: 10px;
            background-color: #323468;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-container {
            display: flex;
            align-items: center;
            float: right;
        }
        .search-container input[type="text"] {
            padding: 8px;
            margin-right: 5px;
        }
        .search-btn {
            padding: 8px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .transparent-table i {
            font-size: 1.2em;
            float: right;
            margin-right: 1em;
            cursor: pointer;
        }
        .far{
            transform:translateX(1em);
        }
        .modal-mask{
            position:absolute;
            top:0;
            left:0;
            height:100vh;
            width:100%;
            z-index:100;
            background-color:rgba(0, 0, 0, 0.534);
            opacity:1;
            transition:opacity 200ms ease-in-out;
            display:flex;
            align-items:center;
            justify-content: center;
        }
        .form-container{
            background-color:white;
            border-radius:5px;
            width:50em;
            display:flex;
            flex-direction:column;
            padding:2em;
        }
        .form-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        #form-content{
            display:flex;
            flex-direction:column;
            margin-top:1em;
        }
        #form-content .form-group{
            display:flex;
            flex-direction:column;
        }
        .select-input{
            height:2.5em;
            font-size:1rem;
            border:1px solid #dedede;
            border-radius: 5px;
        }
        .btn-submit{
            padding:1em;
            background-color:#13c36b;
            font-size:.8rem;
            font-weight:bold;
            color:white;
            border:none;
            border-radius: 15px;
            transition:opacity 150ms ease-in-out;
        }
        .btn-submit:hover{
            cursor: pointer;
            opacity:75%;
        }
        textarea{
            resize:none;
            font-family:sans-serif;
            font-size:1rem;
            padding:.5rem;
            border:1px solid #dedede;
        }
        .hidden{
            visibility:hidden;
            opacity:0;
        }
    </style>
</head>
<body>
    @include('component.employee.sidenav')
    <div class="main-content">
        <h1>Document Request</h1>
        <button class="add-document-request-btn">+ Add Document Request</button>
        <div class="search-container">
            <input type="text" placeholder="Search...">
            <button class="search-btn">&#128269;</button>
        </div>
    <div class="modal-mask hidden">
        <div class="form-container">
            <div class="form-header">
                <h2>Request For a Document</h2>
                <i class="far fa-times-circle" style="font-size:1.3rem;cursor:pointer;"></i>
            </div>
            <form id="form-content">
                <div class="form-group">
                    <label for="document-for">Document For</label>
                    <select id="document-for" class="select-input">
                        <option value="CGMC">
                            Certificate of Good Moral Character
                        </option>
                        <option value="CNLWP">
                            Certificate of No Leave Without Pay - GSIS
                        </option>
                        <option value="COSP">
                            Certification of One and the Same Person
                        </option>
                        <option value="SR">
                            Service Record
                        </option>
                        <option value="SRNLWP">
                            Service Record w/ No Leave Without Pay - GSIS
                        </option>
                        <option value="COCP">
                            Certificate of Contribution - Philhealth (Hospitalized)
                        </option>
                        <option value="PS">
                            Payslip with Signature
                        </option>
                        <option value="COE">
                            Certificate of Employment
                        </option>
                        <option value="CECB">
                            Certificate of Employment with Compenstaion and Benefit
                        </option>
                        <option value="CEDR">
                            Certificate of Employment With Duties and Responisibilities
                        </option>
                        <option value="L">
                            Leave
                        </option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea id="reason" cols="30" rows="10"></textarea>
                </div>
                <br><br>
                <button class="btn-submit" onclick = "addDocuRequest(event)">Save</button>
            </form>
        </div>
    </div>
    <div class="container">
        <table style = "width: 100%;" class="attendance-type">
        <thead>
            <tr>
                <th colspan="2">Request Code</th>
                <th colspan="2">Request Type</th>
                <th colspan="2">Date Requested</th>
                <th colspan="2">Status</th>
            </tr>
        </thead>
    </table>
    <table class="transparent-table">
        <tbody>    
            @php
                $id = Auth::guard('users')->user()->id;
                $docuRequests = \App\Models\DocuRequest::where('employee_id', $id)->get();
            @endphp

            @foreach ($docuRequests as $docuRequest)
                <tr>
                    <td>{{$docuRequest->request_code}}</td>
                    <td>{{$docuRequest->request_type}}</td>
                    <td>{{$docuRequest->date_requested}}</td>
                    <td>
                        {{$docuRequest->request_status}}
                        <a href="/employees/Document-Request/Approval/{{$docuRequest->id}}">
                            <i class="fa-solid fa-file-text" id = "approval-btn"></i>
                        </a>
                        <i class="fa-solid fa-download"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
            <div class="entries-container" style = "font-size: 0.69em; ">
                SHOWING 1 TO 1 OF 1 ENTRIES
                <div class="pagination">
                    <button class="arrow-btn">&#9664;</button>
                    <div class="dropdown">
                        <select>
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
                        </select>
                    </div>
                    <button class="arrow-btn">&#9654;</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        let toggleModal=document.querySelector('.add-document-request-btn');
        let showModal=document.querySelector('.modal-mask');
        let closeModal=document.querySelector('.far');
        let textArea=document.querySelector('textarea');
        let select=document.querySelector('select');
        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
        toggleModal.onclick=()=>{
            showModal.classList.remove('hidden');
        }
        closeModal.onclick=()=>{
            showModal.classList.toggle('hidden');
            select.value="Certificate of Good Moral Character";
            textArea.value="";
        }
    </script>
    <script src = "/JS/Employee/DocuRequest.js"></script>


</body>
</html>