<?php session_start(); ?>

<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Mood Coach | Homepage Header Template</title>

        <!-- CSS Styling -->
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/main_style.css">
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    </head>

    <body>

        <!-- Project Title -->
        <div class = "header">
            <h1 class = "animated fadeInUp">Mood Coach</h1>     <!--   Title  -->
            <p class = "animated fadeInUp"><?php if($_SESSION['usertype'] == 0)
            {   echo "Welcome {$_SESSION['name']}";}
                else{echo "Welcome Dr. {$_SESSION['name']}";} ?></p>

            <!-- <p class = "animated zoomIn">ESIN | Group G</p> -->   <!-- Welcome -->
        </div>
        
        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "#" class = "left"><img src = '../images/cover1.jpg'></a>
            <?php if($_SESSION['cc_number'])        // Clause: Session already Started
            { ?>
                <a href = "signIn.php">Logout</a>
                <?php if($_SESSION['usertype'] == 0)     // Patient Navigation Bar
                { ?>
                    <a href = "../tos.html" class = "left">Forum</a>
                    <a href = "testMenu.php" class = "left">Tests</a>
                    <a href = "../tos.html" class = "left">Organizations</a>
                <?php } 
                else                                // Health Professional Navigation Bar
                { ?>
                    <a href = "../tos.html" class = "left">Forum</a>
                    <a href = "../tos.html" class = "left">Patient List</a>
                    <a href = "../tos.html" class = "left">??</a>
                <?php ; }
            }
            // Clause: Session not Started or Ended
            else{ ?>                                
                <a href = "signIn.php">Login</a>
                <a href = "patientSignUp.php">Register</a>
            <?php } ?>
            
        </div>

    </body>
</html>