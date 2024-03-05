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