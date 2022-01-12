<!DOCTYPE html>
<html lang = "en" dir = "ltr"> 

    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Registration Page Header Template</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">

        <!-- CSS Style Sheets -->
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        
    </head>

    <!---------------------------------------------------->

    <body>

        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "signIn.php">Login</a>
            <a href = "homepage.php" class = "left">Homepage</a>
        </div>

        <!-- Changing between User Type -->
        <div class = "usertype">
            <a <?php if($usertype == 1){ ?> class = "active" <?php } ?> href = "hpSignUp.php">Health Professional</a>
            <a <?php if($usertype == 0){ ?> class = "active" <?php } ?> href = "patientSignUp.php">Patient</a>
        </div>
        
        
    </body>
</html>