let email_field=document.getElementById('EI');
let pass_field=document.getElementById('PI');
let error=document.getElementById('user-error');
let csrf=document.querySelector("meta[name='csrf-token']")

function submitForm(email_data,pass_data){
    fetch('/login-user', {
        method:'POST', 
        headers:{'Content-Type':'application/json', 'X-CSRF-Token': csrf.content},
        body: JSON.stringify({'email': email_data, 'password': pass_data})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success && data.role===1){
            window.location.href='/admin/Dashboard';
        }
        else if(data.success && data.role==2){
            window.location.href='/employees/Home';
        }
        else if(data.success && data.role==3){
            window.location.href='/students/Home';
        }
        else{
            error.textContent="Incorrect Credentials!";
        }
    })
    .catch(error => {
        console.error('Error Loging In', error)
    })
} 

function handleForm(){
    let email = email_field.value;
    let password = pass_field.value;
    let email_err_field=document.getElementById('email-error')
    let pass_err_field=document.getElementById('password-error');
    if(password.length===0){
        pass_err_field.textContent="Password is required!";
    }
    if(email.length===0){
        email_err_field.textContent="Email is required!";
    }
    else{
        pass_err_field.textContent="";
        email_err_field.textContent="";
        submitForm(email,password);
    }
}