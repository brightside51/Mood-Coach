<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Mood Coach</title>

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

    <body>
        <header>
            <div class = "Logo">
                <a href = "../database/homepage.html">
                    <img id = "logotype" src = "cover.jpg" alt = "Website Logo">Mood Coach
                </a>
            </div>
            
            <div class = "header">
                <h1 class = "animated zoomIn">Mood Coach</h1>     <!--   Title  -->
                <p class = "animated zoomIn">ESIN | Group G</p>   <!-- Subtitle -->
            </div>

            <?php //Tarzan your business ?>
            <div class = "Login">

            </div>
        </header>