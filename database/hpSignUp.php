<?php   
    session_start();
    $regError = $_SESSION['regError'];
    unset($_SESSION['regError']);
?>

<!-- Health Professional Registration Form Page -->
<!-- http://localhost:8080/moodcoach/database/hpSignUp.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Patient Registration</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">

    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <!-- Navigation Bar + User Type Changer -->
        <?php $usertype = 1; include('../templates/signUpHeader_tpl.php'); ?>

        <!---------------------------------------------------->

        <!-- Form Main Page Contents -->
        <div class="form-style">

            <!-- Form Title & Subtitle -->
            <h1>Sign Up<span><?php echo $_SESSION['regError'] ?></span></h1>
            <form method = "post" action = "../action_hpRegister.php">

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

                    <!-- Phone Number Input -->
                    <label for = "phone">Phone Number
                    <input type = "number" id = "phone" name = "phone"
                    min = "910000000" max = "999999999" required></input></label>

                </div>

                <!---------------------------------------------------->

                <!-- Career Information Section -->
                <div class="section"><span>2</span>Career Information</div>
                <div class="inner-wrap">

                    <!-- License ID Input -->
                    <label for = "license_id">License ID
                    <input type = "number" id = "license_id" name = "license_id"
                    min = "10000000" max = "99999999" required/></label>

                    <!-- Workplace / Clinical Center ID -->
                    <label for = "workplace_id">Center Number
                    <input type = "number" id = "workplace_id" name = "workplace_id" required></input></label>

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
