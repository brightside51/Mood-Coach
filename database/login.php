<!-- Login Form Page -->
<!-- http://localhost:8080/moodcoach/database/login.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Login Form</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">
        
        <!-- CSS Styling -->
        <style>

            /* Borders Applied to All */
            *{box-sizing: border-box;}

            /* Body Style */
            body{font-family: Arial, Helvetica, sans-serif; margin: 0;}

            /* Top Navigation Bar Class + Links*/
            .navbar{overflow: hidden; background-color: #333;}
            .navbar a
            {   float: right; text-align: center;
                display: block; padding: 14px 20px;
                color: white; text-decoration: none;}
            .navbar a.left{float: left;}
            .navbar a.hover{background-color: #ddd; color: white;}

            /* Form Main Page Content */
            /*
            .form_prompt
            .form_input*/
            div{margin-bottom: 10px; position: relative;}
            input[type="number"]{width: 100px;}
            input::-webkit-outer-spin-button,input::-webkit-inner-spin-button{
                -webkit-appearance: none; margin: 0;}
            input + span{padding-right: 30px;}
            input:invalid+span:after{position: absolute; content: 'X'; padding-left: 5px;}
            input:valid+span:after{position: absolute; content: '✓'; padding-left: 5px;}
            
            /*
            input:invalid+span:after {content: '✖'; padding-left: 5px;}
            input:valid+span:after {content: '✓'; padding-left: 5px;}
            */

            /* Footnotes/Footer */
            .footnote
            {   position: fixed; bottom: 0;
                width: 100%; height: 45px; padding: 0px;
                overflow: hidden; background-color: #333;}
            .footnote h2
            {   font-size: 20px; color: white; text-align: center;
                float: right; display: block; padding: 0px 20px;}
            .footnote h2.left{float: left;}

            /* Adaptative Layout for Smaller Screen ()*/
            @media screen and (max-width:400px)
            {.navbar a{float: none;width: 100%;}}
            

        </style>
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "#">Register</a>
            <a href = "homepage.html" class = "left">Homepage</a>
        </div>

        <!-- Form Section -->
        <form method = "post" action = "">
            
            <!-- CC Number Input -->
            <div>
                <label for = "cc_number">Citizen's Card Number (CC)</label>
                <input type = "number" id = "cc_number" name = "cc_number"
                min = "10000000" max = "99999999" required> <br>
                <span class = "validity"></span>
            </div>

            <!-- Password Input -->
            <div>
                <label for = "pwd">Password</label>
                <input type = "password" id = "pwd" name = "password" required> <br>
            </div>

            <!-- Input Obtainal & Checking -->
            <h5>
                <?php
                    $cc = $_GET['cc_number'];
                    $pwd = $_GET['password'];
                    echo "User: $cc ; Password: $pwd";
                ?>
            </h5>

            <!-- Sign In Button -->
            <div>
                <input type = "submit" value = "Sign In">
            </div>

        </form>

        <!-- Footnotes -->
        <div class = "footnote">
            <h2 class = "left">ESIN</h2>
            <h2>2021/22</h2>
        </div>

    </body>

</html>
