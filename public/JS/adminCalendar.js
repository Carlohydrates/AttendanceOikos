var dateStr=" ";
var dateInput=" ";
var date_color=[]
dates.forEach(date=>{
    let instance={
        start:'',
        color:'',
    }
    instance.start=date.calendar_created;
    instance.color=date.color;
    date_color.push(instance);
})
const csrf = document.querySelector("meta[name='csrf-token']")
const editContent=document.querySelector('.chosen-edit');
const addContent=document.querySelector('.chosen-add');
const addBtn=document.querySelector('.add-btn');
const delBtn=document.querySelector('.del-btn');
const editBtn=document.querySelector('.edit-btn');
var calendarEl = document.querySelector('.calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone:'local',
    initialView: 'dayGridMonth',
    selectable:true,
    events:date_color,
    /*events:[
        {
            start:'2024-02-27',
            color:'red',
        },
        {
            start:'2024-02-27',
            color:'blue'
        }
    ],*/
    dateClick:function(arg){
        let hasInstance=false;
        dateStr=arg.date;
        dateInput=arg.dateStr;
        for(i=0;i<date_color.length;i++){
            if(date_color[i].start==dateInput){
                hasInstance=true;
                break;
            }
        }
        if(hasInstance){
            showEditContent();
            return;
        }
        showAddContent();
    },
});
calendar.render();
function showAddContent(){
    const dateHeader=addContent.querySelector('h1');
    const dateSubHeader=addContent.querySelector('h2');
    const prevContents=document.querySelectorAll('.show');
    const dateString=String(dateStr);
    const date=dateString.split(" ");
    prevContents.forEach(content=>{
        console.log(content);
        content.classList.remove('show');
        content.classList.toggle('hidden');
    })
    addContent.classList.toggle('show');
    addContent.classList.remove('hidden');
    dateHeader.innerHTML=`
        ${date[0]}
    `;
    dateSubHeader.innerHTML=`
        ${date[1]}-${date[2]}-${date[3]} 
    `;
}
function updateEvent(event){
    event.preventDefault();
    const eventInfo={
        date:dateInput,
        title:document.getElementById('edit-title').value,
        subject:document.getElementById('edit-subject').value,
        duration:document.getElementById('edit-duration').value,
        venue:document.getElementById('edit-venue').value,
        theme:document.getElementById('edit-theme').value,
        message:document.getElementById('edit-message').value,
        color:document.getElementById('edit-color').value
    };
    fetch('/update-event',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrf.content,
        },
        body:JSON.stringify(eventInfo)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }
    })
    .catch(error=>{
        console.log("Error updating event data",error);
    })
}
function cancelEvent(event){
    event.preventDefault();
    const editBtn=document.querySelector('.edit-btn');
    const delBtn=document.querySelector('.delete-btn');
    const updateBtn=document.querySelector('.update-btn');
    const cancelBtn=document.querySelector('.cancel-btn');
    editBtn.classList.remove('hidden');
    delBtn.classList.remove('hidden');
    updateBtn.classList.toggle('hidden');
    cancelBtn.classList.toggle('hidden');
    document.getElementById('edit-title').readOnly=true;
    document.getElementById('edit-subject').readOnly=true;
    document.getElementById('edit-duration').readOnly=true;
    document.getElementById('edit-venue').readOnly=true;
    document.getElementById('edit-theme').readOnly=true;
    document.getElementById('edit-message').readOnly=true;
    document.getElementById('edit-color').disabled=true;
}
function deleteEvent(event){
    event.preventDefault();
    Swal.fire({
        position: 'center',
        icon: 'question',
        title: 'Are you sure you want to delete this event',
        cancelButtonText:'No',
        confirmButtonText:'Yes',
        showConfirmButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/delete-event',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-Token':csrf.content,
                },
                body:JSON.stringify({date:dateInput})
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
function showEditContent(){
    const dateHeader=editContent.querySelector('h1');
    const dateSubHeader=editContent.querySelector('h2');
    const prevContents=document.querySelectorAll('.show');
    const dateString=String(dateStr);
    const date=dateString.split(" ");
    prevContents.forEach(content=>{
        content.classList.remove('show');
        content.classList.toggle('hidden');
    })
    editContent.classList.remove('hidden');
    editContent.classList.toggle('show');
    dateHeader.innerHTML=`
        ${date[0]}
    `;
    dateSubHeader.innerHTML=`
        ${date[1]}-${date[2]}-${date[3]} 
    `;
    fetch(`/retrieve-calendar-date/${dateInput}`,{
        method:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrf.content,
        },
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            let date_data=data.content[0];
            document.getElementById('edit-title').value=date_data.title;
            document.getElementById('edit-subject').value=date_data.subject;
            document.getElementById('edit-duration').value=date_data.duration;
            document.getElementById('edit-venue').value=date_data.venue;
            document.getElementById('edit-theme').value=date_data.theme;
            document.getElementById('edit-message').textContent=date_data.message;
            document.getElementById('edit-color').value=date_data.color;
        }
    })
    .catch(error=>{
        console.log("Error retrieving edit data ",error);
    })
}
function editEvent(event){
    event.preventDefault();
    removeReadonly();
}
function removeReadonly(){
    const editBtn=document.querySelector('.edit-btn');
    const delBtn=document.querySelector('.delete-btn');
    const updateBtn=document.querySelector('.update-btn');
    const cancelBtn=document.querySelector('.cancel-btn');
    editBtn.classList.toggle('hidden');
    delBtn.classList.toggle('hidden');
    updateBtn.classList.remove('hidden');
    cancelBtn.classList.remove('hidden');
    document.getElementById('edit-title').readOnly=false;
    document.getElementById('edit-subject').readOnly=false;
    document.getElementById('edit-duration').readOnly=false;
    document.getElementById('edit-venue').readOnly=false;
    document.getElementById('edit-theme').readOnly=false;
    document.getElementById('edit-message').readOnly=false;
    document.getElementById('edit-color').disabled=false;
}
function addEvent(event){
    if(!dateInput || dateInput.trim()===""){
        console.error("Invalid date input Please select a date");
        return;
    }
    console.log(dateInput);
    const eventInfo={
        date:dateInput,
        title:document.getElementById('title').value,
        subject:document.getElementById('subject').value,
        duration:document.getElementById('duration').value,
        venue:document.getElementById('venue').value,
        theme:document.getElementById('theme').value,
        color:document.getElementById('color').value,
        message:document.getElementById('message').value
    };
    event.preventDefault();
    fetch('/add-event',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrf.content,
        },
        body:JSON.stringify(eventInfo)
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            location.reload();
        }
    })
    .catch(error=>{
        console.log("Error storing event data",error);
    })
}