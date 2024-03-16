const csrf = document.querySelector("meta[name = 'csrf-token']")

function addGradeLevel (event) {
    event.preventDefault();

    const gradeandsection={
        'gradeLevel':document.getElementById('select-grade-level').value,
        'section':document.getElementById('new-section').value
    };

    fetch("/add-grade-section", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': csrf.content },
        body: JSON.stringify(gradeandsection)
    })
    .then(response => response.json())
    .then(data => {
        console.log('grade level added successfully:', data);
        location.reload();  
    })
    .catch(error => {
        console.log('Error adding grade level/s', error);
    });
}

function getGradeLevels(gradeLevelID, existingID="") {
    fetch('/get-grade-levels',{
        method: 'GET',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': csrf.content },
    })
        
    .then(response => response.json())
    .then(data => {
        var levels = data.grade_level;
        const gradeLevelSelect = document.getElementById(gradeLevelID);
        console.log(existingID);
        gradeLevelSelect.innerHTML = "";
        const defaultOption = document.createElement('option');
        defaultOption.text = "---";
        gradeLevelSelect.add(defaultOption);

        for (let i = 0; i < levels.length; i++) {
            if (levels[i].grade_level == existingID) {
                const option = document.createElement('option');
                option.value = levels[i].grade_level;
                option.text = levels[i].grade_level;
                option.selected = true;
                gradeLevelSelect.add(option);
                continue;
            }
            const option = document.createElement('option');
            option.value = levels[i].grade_level;
            option.text = levels[i].grade_level;
            gradeLevelSelect.add(option);
        }
    })
    .catch(error => console.error('Error:', error));
}

function getSections(gradeLevelID, sectionID) {
    const selectedGradeLevel = document.getElementById(gradeLevelID).value;
    const sectionSelect = document.getElementById(sectionID);
    // Reset the section dropdown
    sectionSelect.innerHTML = "";

    // Add default option
    const defaultOption = document.createElement('option');
    defaultOption.value = "null";
    defaultOption.text = "---";
    sectionSelect.add(defaultOption);

    // Fetch sections for the selected grade level
    fetch(`/get-sections/${selectedGradeLevel}`)
        .then(response => response.json())
        .then(data => {
            var sections = data.section;
            sections.forEach(section => {
                const option = document.createElement('option');
                option.value = section.section;
                option.text = section.section;
                sectionSelect.add(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

getGradeLevels('grade-level');
getGradeLevels('remove-grade-level');
getGradeLevels('gradeFilter');

function removeGradeLevelAndSection() {
    const gradeLevel = document.getElementById('remove-grade-level').value;
    const section = document.getElementById('remove-section').value;

    fetch("/remove-grade-section", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': csrf.content },
        body: JSON.stringify({ gradeLevel, section })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Grade level and section removed successfully:', data);
        location.reload();
    })
    .catch(error => {
        console.log('Error removing grade level and section:', error);
    });
}

