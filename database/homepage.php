<!-- Login Form Page -->
<!-- http://localhost:8080/moodcoach/database/homepage.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Head -->
    <head>
        <meta charset = "utf-8">
        <title>HomePage</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">
        
        <!-- CSS Styling -->
        <style>

            /* Borders Applied to All */
            *
            {
                box-sizing: border-box;
            }

            /* Body Style */
            body
            {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
            }

            /* Page Header/Title + Logo Class */
            .header
            {
                width: 100%; height: 300px;
                align-items: center; justify-content: center;
                padding: 50px;
                text-align: center;
                background: #008080;
                color: white;
            }

            /* Heading Font Size */
            .header h1
            {
                font-size: 40px;
            }

            /* Top Navigation Bar Style */
            .navbar
            {
                overflow: hidden;
                background-color: #333;
            }

            /* Top Navigation Bar Default (Right) Link Style */
            .navbar a
            {
                float: right;
                display: block;
                color: white;
                text-decoration: none;
                text-align: center;
                padding: 14px 20px;
            }

            /* Top Navigation Bar Left Link Style */
            .navbar a.left
            {
                float: left;
            }

            /* Top Navigation Bar Links - Changing Color on Hover */
            .navbar a.hover
            {
                background-color: #ddd;
                color: black;
            }

            /* Homepage Contents */
            .main
            {
                display: flex;
                flex-direction: column;
                overflow: auto;
                padding: 0 0 55px;
            }

            /* Footnotes/Footer */
            .footnote
            {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 45px;
                padding: 0px;
                overflow: hidden;
                background-color: #ddd;
            }
            .footnote h2
            {
                font-size: 20px;
                float: right;
                display: block;
                color: white;
                text-align: center;
                padding: 0px 20px;
            }
            .footnote h2.left
            {
                float: left;
            }

            /* Adaptative Layout for Smaller Screen ()*/
            @media screen and (max-width:400px)
            {
                .navbar a
                {
                    float: none;
                    width: 100%;
                }
            }
            
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
            <a href = "test.html">Login</a>
            <a href = "#">Register</a>
            <a href = "#" class = "left">Idk</a>
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

        <!-- Footnotes -->
        <div style="clear:both;"></div>
        <div class = "footnote">
            <h2 class = "left">ESIN</h2>
            <h2>2021/22</h2>
        </div>

    </body>


</html>
