var x =document.getElementsByClassName("emp-details")[0];
var y =document.getElementsByClassName("fam-details")[0];
var z =document.getElementsByClassName("exp-details")[0];
var e =document.getElementsByClassName("edu-details")[0];
var r =document.getElementsByClassName("ref-details")[0];
var l =document.getElementsByClassName("add-fam-details")[0];
var m =document.getElementsByClassName("add-edu-details")[0];
var o =document.getElementsByClassName("add-exp-details")[0];
var p =document.getElementsByClassName("add-ref-details")[0];
const csrf = document.querySelector("meta[name = 'csrf-token']");




//Adding buttons
function addfamily(){
    m.style.display ="block"
}
function addfamily(){
    l.style.display ="block"
}
function addexperience(){
    o.style.display="block"
}
function addreference(){
    p.style.display="block"
}


//Edit Butons
function education(){
    e.style.display ="block"
}
function reference(){
    r.style.display = "block"
}

function family(){
     y.style.display ="block";
}
function experience(){
    z.style.display ="block";
}

function personalinfo(){
    x.style.display ="block";
}

function closeForms(){
    x.style.display ="none";
    y.style.display ="none";
    z.style.display ="none";
    e.style.display ="none";
    r.style.display ="none";
    l.style.display="none"
}

let employeedetails = document.getElementById('emp_details');
let familydetails = document.getElementById('fam_details');
let experiencedetails = document.getElementById('exp_details');
let personaldetails = document.getElementById('emp_details');
let refdetails = document.getElementById('ref_details');
emp_details.addEventListener('submit',function(event){
    event.preventDefault();
console.log('form submitted');
x.style.display="none";
});

 

//editing employee details
function emp_details(event){
    event.preventDefault();
    const employee={
        firstName:document.getElementById('firstName').value,
        lastName:document.getElementById('lastName').value,
        middleName:document.getElementById('middleName').value,
        extension:document.getElementById('extension').value,
        birthdate:document.getElementById('birthdate').value,
        phoneNumber:document.getElementById('phoneNumber').value,
        address:document.getElementById('address').value,
        email:document.getElementById('email').value,
        City:document.getElementById('City').value,
        region:document.getElementById('region').value,
        postal:document.getElementById('postal').value,
        country:document.getElementById('country').value,
        nationality:document.getElementById('nationality').value,
        sex:document.getElementById('sex').value,
        telephone:document.getElementById('telephone').value,
    };
    fetch("/edit-emp-details",{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRD-Token': csrf.content},
        body:JSON.stringify(emp)
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

//editing family details
function fam_details(event){
    event.preventDefault();
    const ebackg={
        //father
        f_firstName:document.getElementById('f_firstName').value,
        f_middleName:document.getElementById('f_middleName').value,
        f_lastName:document.getElementById('f_lasttName').value,
        f_extension:document.getElementById('f_extension').value,
        //mother
        m_firstname:document.getElementById('m_firstname').value,
        m_middleName:document.getElementById('m_middleName').value,
        m_lastName:document.getElementById('m_lastName').value,
        m_extension:document.getElementById('m_extension').value,
        //spouse
        sp_firstname:document.getElementById('sp_firstname').value,
        sp_middleName:document.getElementById('sp_middleName').value,
        sp_lastName:document.getElementById('sp_lastName').value,
        sp_extension:document.getElementById('sp_extension').value,       
    };
    fetch("/add-fam-detail",{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRD-Token':csrf.content},
        body:JSON.stringify(ebg)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }
    })
        .catch(error => {
            console.log('ERROR! background did not submit.',error);
    })
}

function edu_details(event){
    event.preventDefault();
    const eeducation={
        J_school:document.getElementById('J-school').value,
        J_year:document.getElementById('J-year').value,
        J_contact:document.getElementById('J-contact').value,
        J_phone:document.getElementById('J-phone-Number').value,
        J_address:document.getElementById('J-address').value,
        
        S_school:document.getElementById('S-school').value,
        S_year:document.getElementById('S-year').value,
        S_contact:document.getElementById('S-contact').value,
        S_phone:document.getElementById('S-phone-Number').value,
        S_address:document.getElementById('S-address').value,

        C_school:document.getElementById('C-school').value,
        C_year:document.getElementById('C-year').value,
        C_contact:document.getElementById('C-contact').value,
        C_phone:document.getElementById('C-phone-Number').value,
        C_address:document.getElementById('C-address').value,
    };
    fetch("/add-edu-details",{
        method:'POST',
        header:{'Content-Type':'application/json','X-CSRD-Token':csrf.content},
        body:JSON.stringify(edu)
    })
    .then(response=>response.json())
    .then(data=>{
        if (data.success){
            location.reload();
        }
    })
    .catch(error => {
        console.log('ERROR! background did not submit.',error);
    })
}

function exp_details(event){
    event.preventDefault();
    const eexperience={
        //1st
        company_name_one:document.getElementById('company-name-one').value,
        company_title_one:document.getElementById('company-title-one').value,
        company_contact_one:document.getElementById('company-contact-one').value,
        company_description_one:document.getElementById('company-description-one').value,
        company_duration_one:document.getElementById('company-duration-one').value,
        company_number_one:document.getElementById('company-number-one').value,
        company_address_one:document.getElementById('company-address-one').value,
        //2md
        company_name_two:document.getElementById('company-name-two').value,
        company_title_two:document.getElementById('company-title-two').value,
        company_contact_two:document.getElementById('company-contact-two').value,
        company_description_two:document.getElementById('company-description-two').value,
        company_duration_two:document.getElementById('company-duration-two').value,
        company_number_two:document.getElementById('company-number-two').value,
        company_address_two:document.getElementById('company-address-two').value,
        //3rd
        company_name_three:document.getElementById('company-name-three').value,
        company_title_three:document.getElementById('company-title-three').value,
        company_contact_three:document.getElementById('company-contact-three').value,
        company_description_three:document.getElementById('company-description-three').value,
        company_duration_three:document.getElementById('company-duration-three').value,
        company_number_three:document.getElementById('company-number-three').value,
        company_address_three:document.getElementById('company-address-three').value,
    };

    fetch("/add-exp-details",{
        method:'POST',
        header:{'Content-Type':'application/json','X-CSRD-Token':csrf.content},
        body:JSON.stringify(exp)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }

    })
    .catch(error => {
        console.log('ERROR! background did not submit.',error);
    })
}

function ref_details(event){
    event.preventDefault();
    const ereference={
        reference_one_name:document.getElementById('reference-one-name').value,
        reference_one_company:document.getElementById('reference-one-company').value,
        reference_one_contact:document.getElementById('reference-one-contact').value,
        reference_one_relation:document.getElementById('reference-one-relation').value,
        reference_one_position:document.getElementById('reference-one-position').value,

        reference_two_name:document.getElementById('reference-two-name').value,
        reference_two_company:document.getElementById('reference-two-company').value,
        reference_two_contact:document.getElementById('reference-two-contact').value,
        reference_two_relation:document.getElementById('reference-two-relation').value,
        reference_two_position:document.getElementById('reference-two-position').value,

        reference_three_name:document.getElementById('reference-three-name').value,
        reference_three_company:document.getElementById('reference-three-company').value,
        reference_three_contact:document.getElementById('reference-three-contact').value,
        reference_three_relation:document.getElementById('reference-three-relation').value,
        reference_three_position:document.getElementById('reference-three-position').value,
    };
    fetch("/add-ref-details",{
        method:'POST',
        header:{'Content-Type':'application/json','X-CSRD-Token':csrf.content},
        body:JSON.stringify(ref)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }
    })
    .catch(error=>{
        console.log('Error! Background did not submit.',error);
    })
}


