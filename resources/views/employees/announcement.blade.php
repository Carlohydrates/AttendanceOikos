<!DOCTYPE html>
<html lang="en">
{{--
    This head section sets up the basic structure and functionality of the webpage:
    - It specifies the character encoding and viewport for responsive design.
    - Links to custom CSS for styling and Font Awesome for icons.
    - Includes SweetAlert2 for interactive alerts and jQuery for DOM manipulation and AJAX functionality.
    - Lastly, it sets the title of the webpage.
--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/assets/Oikos Logo.png">
    <link rel="stylesheet" href = "/CSS/employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Oikos Employee: Announcement</title>
</head>
<body>
    {{-- Include employee side navigation component --}}
    @include('component.employee.sidenav')

    {{-- Announcements --}}
    <div class="main-content">
        <h1>Announcements</h1>
        @include('component.employee.annoucement_component') {{-- Include employee announcement component --}}
    </div>

    {{-- Javascript code for sidenav --}}
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
    </script>
    {{-- Link javascript for logout function --}}
    <script src="/JS/logout.js"></script>

</body>
</html>