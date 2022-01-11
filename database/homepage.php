<!-- Home Page -->
<!-- http://localhost:8080/moodcoach/database/homepage.html -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Homepage</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">
        
        <!-- CSS Styling -->
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <style>

            /* Page Header/Title + Logo Class */
            .header
            {   width: 100%; height: 300px;
                font: normal 'Bitter', Arial;
                padding: 50px; padding-left: 50px; padding-right: 50px;
                align-items: center; justify-content: center;
                text-align: center; color: white; background: #008080;}
            .header h1{font-size: 40px;}

            /* Homepage Contents */
            .main
            {   display: flex; flex-direction: column; overflow: auto;
                padding: 0 0 55px; padding-left: 50px; padding-right: 50px;
                background-color: #ddd;}
            
        </style>
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <!-- Project Title -->
        <div class = "header">
            <h1 class = "animated zoomIn">Mood Coach</h1>     <!--   Title  -->
            <p class = "animated zoomIn">ESIN | Group G</p>   <!-- Subtitle -->
        </div>
        
        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "sign_in.php">Login</a>
            <a href = "sign_up.php">Register</a>
            <a href = "#" class = "left">Homepage</a>
        </div>
        
        <!-- About Us Section -->
        <div class = "main">
            <h1>About Us</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Insert Group Table Here</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>

        <?php include('../templates/footer_tpl.php')?>
        

    </body>


</html>
