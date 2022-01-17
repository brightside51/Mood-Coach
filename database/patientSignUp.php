<?php   
    session_start();
    $_SESSION['sel_usertype'] = 0;
    $regError = $_SESSION['regError'];
    unset($_SESSION['regError']);
?>

<!-- Patient Registration Form Page -->
<!-- http://localhost:8080/moodcoach/database/patientSignUp.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Patient Registration</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">

        <!-- CSS Style -->
        <link rel = "stylesheet" type = "text/css" href = "../css/styleSheet.css">
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <!-- Navigation Bar + User Type Changer -->
        <?php include('../templates/signUpHeader_tpl.php');
        require('userList.php'); $hpList = getHPList(); ?>

        <!---------------------------------------------------->

        <!-- Form Main Page Contents -->
        <div class="form-style">

            <!-- Form Title & Error Message -->
            <h1>Sign Up<span><?php if($regError)
                { ?> User with <?php echo $regError ?> already exists.
                Try <a href = "signIn.php">logging in</a>! <?php } ?></span></h1>
            
            <form method = "post" action = "../action_patientRegister.php">

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
                    <input type = "text" id = "doctor" name = "doctor" list = "hpList" required></input></label>
                    <datalist id = "hpList">
                    <?php foreach($hpList as $hp){
                        echo '<option value = "' . $hp['name_'] . '">' . '</option>'; ?>
                    <?php } ?>
                    </datalist>
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
