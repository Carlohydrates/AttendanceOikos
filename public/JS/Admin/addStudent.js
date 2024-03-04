const csrf = document.querySelector("meta[name = 'csrf-token']")

function addStudent (event) {
    event.preventDefault();

    const student={
        'firstName':document.getElementById('first-name').value,
        'middleName':document.getElementById('middle-name').value,
        'lastName':document.getElementById('last-name').value,
        'extension':document.getElementById('extension').value,
        'gradeLevel':document.getElementById('grade-level').value,
        'section':document.getElementById('section').value,
        'fetcher':document.getElementById('fetch').value,
        'enrollStatus':document.getElementById('enroll-status').value,
        'birthday':document.getElementById('birthday').value,
        'age':document.getElementById('age').value,
        'address':document.getElementById('address').value,
        'city':document.getElementById('city').value,
        'region':document.getElementById('region').value,
        'postalCode':document.getElementById('postal-code').value,
        'country':document.getElementById('country').value,
        'nationality':document.getElementById('nationality').value,
        'sex':document.getElementById('sex').value,
        'telephoneNumber':document.getElementById('telephone-number').value,
        'mobileNumber':document.getElementById('mobile-number').value
    };

    fetch("/add-student", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': csrf.content },
        body: JSON.stringify(student)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Student added successfully:', data);
        location.reload();
    })
    .catch(error => {
        console.log('Error adding student/s', error);
    });
}
