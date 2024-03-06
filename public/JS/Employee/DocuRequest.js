const csrf = document.querySelector("meta[name = 'csrf-token']")

function addDocuRequest (event) {
    event.preventDefault();

    const documentReq={
        'request_type':document.getElementById('document-for').value,
        'reason':document.getElementById('reason').value
    };

    fetch('/add-document-request', {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'X-CSRF-Token': csrf.content },
        body: JSON.stringify(documentReq)
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