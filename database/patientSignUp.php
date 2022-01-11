<!-- Registration Form Page -->
<!-- http://localhost:8080/moodcoach/database/registration.php -->



<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Sign Up</title>
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
            <a href = "sign_in.php">Login</a>
            <a href = "homepage.php" class = "left">Homepage</a>
        </div>

        <!---------------------------------------------------->

        <!-- Form Main Page Contents -->
        <div class="form-style">

            <!-- Form Title & Subtitle -->
            <h1>Sign Up<span>Register now for World-Class Medical Follow-Ups and Feedback</span></h1>
            <form method = "post" action = "action_register.php">

                <!-- Personal Information Section -->
                <div class="section"><span>1</span>Personal Information</div>
                <div class="inner-wrap">

                    <!-- Name Input -->
                    <label for = "name">Full Name
                    <input type = "text" id = "name" name = "name" required></input></label>

                    <!-- Email Input -->
                    <label for = "email">Email Address
                    <input type = "text" id = "email" name = "email" 
                    placeholder = "up201800000@example.com" minlength = "3" maxlength = "64" required></input></label>

                    <!-- Birthdate Input -->
                    <label for = "birthdate">Birthdate
                    <input type = "date" id = "birthdate" name = "birthdate"
                    value = "2000-01-01" min = "1922-01-01" max = "2006-01-01" required></input></label>

                    <!-- Phone Number Input -->
                    <label for = "phone">Phone Number
                    <input type = "number" id = "phone" name = "phone"
                    min = "910000000" max = "999999999" required></input></label>

                    <!-- Address Input -->
                    <label for = "address">Address
                    <input type = "text" id = "address" name = "address" required></input></label>

                </div>

                <!---------------------------------------------------->

                <!-- Health Information Section -->
                <div class="section"><span>2</span>Health Information</div>
                <div class="inner-wrap">

                    <!-- Health Number Input -->
                    <label for = "health_number">CC Health Number
                    <input type = "number" id = "health_number" name = "health_number"
                    min = "10000000" max = "99999999" required/></label>

                    <!-- Health Professional Input -->
                    <label for = "doctor">Responsible Medical Professional
                    <input type = "text" id = "doctor" name = "doctor" required></input></label>
                </div>

                <!---------------------------------------------------->

                <!-- Login Information Section using Template -->
                <div class="section"><span>3</span>Login Information</div>
                <?php include('../templates/login_tpl.php') ?>

            </form>
        </div>

        <!---------------------------------------------------->

        <!-- Footnotes/Footer -->
        <?php include('../templates/footer_tpl.php')?>

    </body>
</html>
