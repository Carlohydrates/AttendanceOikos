let csrf=document.querySelector("meta[name = 'csrf-token']");
let enabledEdit=false;
let hideInputFields=true;
// Logout
function logout() {
    Swal.fire({
        title: "Are you sure you want to logout??",
        showCancelButton: true,
        confirmButtonText: "Logout",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/student/logout';
        }
    });
}

let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function () {
    sidebar.classList.toggle('active');
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

function handleEditOptions(idSelectors){
    let editBtn=document.querySelector('.edit-btn');
    let updateBtn=document.querySelector('.update-btn');
    let cancelBtn=document.querySelector('.cancel-btn');
    if(enabledEdit==false){
        hideInputFields=false;
        editBtn.hidden=true;
        enabledEdit=true;
    }
    else{
        hideInputFields=true;
        editBtn.hidden=false;
        enabledEdit=false;
    }
    idSelectors.forEach(id=>{
        let selectedId=document.getElementById(id);
        selectedId.readOnly=hideInputFields;
        selectedId.disabled=hideInputFields;
    });
    updateBtn.hidden=hideInputFields;
    cancelBtn.hidden=hideInputFields;
}

function updateStudentParentInfo(event){
    event.preventDefault();
    let parent_info={
        parent_name:document.getElementById('parent_name').value,
        phone_number:document.getElementById('mobile_number').value,
        telephone_number:document.getElementById('telephone_number').value,
    };
    fetch('/update-student-backg',{
        method:"POST",
        headers:{'X-CSRF-TOKEN':csrf.content,'Content-Type':'application/json'},
        body:JSON.stringify(parent_info)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }
    })
    .catch(error=>{
        console.log("Error updating parent information ",error);
    })
}