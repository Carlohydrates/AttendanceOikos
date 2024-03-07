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
    function retrieveDocuData (id) {
        let docu_id = id;
        console.log(docu_id);
        fetch(`/retrieve-docu-data/${docu_id}`, {
            method: 'GET',
            headers:{'Content-Type':'application/json','X-CSRF-Token': csrf.content},
        })
        .then(response=>response.json())
        .then(data=>{
            var user_instance = data.user_data;
            console.log(user_instance[0]);

            showDocuData(user_instance[0]);
            showActionModal.classList.remove('hidden');
            

        })
        .catch(error =>{
            console.log('Error! Document data did not submit.',error);
        })
    }

    function showDocuData (user_instance) {
        let formContainer = document.querySelector('.form-container');

        console.log(user_instance);
        formContainer.innerHTML = `
                <div class="form-header">
                    <h2>Requested Document</h2>
                    <i class="far fa-times-circle" style="font-size:1.3rem;cursor:pointer;"></i>
                </div>
                <form id="form-content" style = "margin-top: 10px;">
                    <div class="form-group" style = "flex-direction: row;">
                        <div class="input-group">
                            <input type="text" class='input-field' id='requestor-name' value="${user_instance.requestor_name}" readonly>
                            <label for="requestor-name">Requestor Name</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class='input-field' id='request-code' value="${user_instance.request_code}" readonly>
                            <label for="request-code">Request Code</label>
                        </div>

                        <div class="input-group">
                            <input type="text" class='input-field' id='date-requested' value="${user_instance.date_requested}" readonly>
                            <label for="date-requested">Date Requested</label>
                        </div>
                    
                    </div>
                    <div class="form-group">
                        <div class="input-group-special">
                            <input type="text" class='input-field' id='request-type' value="${user_instance.request_type}" readonly>
                            <label for="request-type">Request Type</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea id="reason" cols="30" rows="10" readonly>${user_instance.reason}</textarea>
                    </div>
                    <br>
                    <div class="form-group-file">
                        <div class="input-group-file">
                            <label for="attachment">Attachment</label>
                            <input type="file" id="attachment" name="attachment">
                        </div>
                    </div>
                    <br><br>
                    <div class="submit-group">
                        <button class="btn-submit">Approve</button>
                        <button class="btn-reject">Reject</button>
                    </div>
                </form>`;
                let newCloseModal = document.querySelector('.far');

                newCloseModal.addEventListener('click', function() {
                    showActionModal.classList.add('hidden');
                });
    }
    
    let showActionModal = document.querySelector('.modal-mask');
    

   
    
