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
            <a href = "homepage.php" class = "left">Homepage</a>
        </div>

        <!-- Form Main Page Contents -->
        <div class="form-style">

            <!-- Form Title & Subtitle -->
            <h1>Sign In</h1>

            <form method = "post" action = "login.php">

                <!-- Login Form Template -->
                <?php include('../templates/login_tpl.php') ?>
            </form>
        </div>

        <!-- Footnotes/Footer -->
        <?php include('../templates/footer_tpl.php')?>

    </body>

</html>
