<!-- Login Form Page -->
<!-- http://localhost:8080/moodcoach/database/sign_in.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Sign In</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">
        
        <!-- CSS Styling -->
        <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/form_style.css">

    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "sign_up.php">Register</a>
            <a href = "homepage.html" class = "left">Homepage</a>
        </div>

        <!-- Form Main Page Contents -->
        <div class="form-style">

            <!-- Form Title & Subtitle -->
            <h1>Sign In</h1>

            <form method = "post" action = "login.php">

                <!-- Input Areas -->
                <div class="inner-wrap">

                    <!-- CC Number Input -->
                    <label for = "cc_number">Citizen's Card Number (CC)
                    <input type = "number" id = "cc_number" name = "cc_number"
                    min = "10000000" max = "99999999" required/></label>

                    <!---------------------------------------------------->

                    <!-- Password Input -->
                    <label for = "pwd">Password
                    <input type = "password" id = "pwd" name = "password" required></input></label>      

                </div>
                
                <!---------------------------------------------------->
                
                <!-- Submit Button -->
                <div class="button-section">
                    <input type="submit" name="submit" />
                    <span class="privacy-policy">
                    <input type="checkbox" name="tos">You agree to our <a href = tos.html>Terms of Service</a>. 
                    </span>
                </div>
                
            </form>
        </div>

        <!-- Footnotes -->
        <div class = "footnote">
            <h2 class = "left">ESIN</h2>
            <h2>2021/22</h2>
        </div>

    </body>

</html>
