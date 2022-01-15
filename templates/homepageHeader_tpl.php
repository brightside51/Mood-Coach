<?php session_start();
$_SESSION['page'] = 'home'; ?>

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
            <p class = "animated fadeInUp">
                <?php if(isset($_SESSION['cc_number']))
                {
                    if($_SESSION['usertype'] == 0)
                    {
                        echo "Welcome {$_SESSION['name']}";
                    }
                    else
                    {
                        echo "Welcome Dr. {$_SESSION['name']}";
                    }
                }
                else
                {
                    echo "ESIN | Group G";
                } ?></p>

            <!-- <p class = "animated zoomIn">ESIN | Group G</p> -->   <!-- Welcome -->
        </div>
        
        <!-- Navigation Bar -->
        <div class = "navbar">
            <a <?php if($_SESSION['page'] == 'home'){ ?> class = "active" <?php } ?> href = "#"><img src = '../images/cover1.jpg'></a>
            
            <?php if(isset($_SESSION['cc_number']))            // Clause: Session already Started
            { ?>

                <a class = "right" href = "../action_logout.php">Logout</a>
                <a <?php if($_SESSION['page'] == 'forum'){ ?> class = "active" <?php } ?> href = "../tos.html">Forum</a>

                <?php if($_SESSION['usertype'] == 0)    // Patient Navigation Bar
                { ?>
                    <a <?php if($_SESSION['page'] == 'test'){ ?> class = "active" <?php } ?> href = "../testMenu.php">Tests</a>
                    <a <?php if($_SESSION['org'] == 'home'){ ?> class = "active" <?php } ?> href = "../tos.html">Organizations</a>
                <?php } 
                
                else                                    // Health Professional Navigation Bar
                { ?>
                    <a <?php if($_SESSION['page'] == 'patientList'){ ?> class = "active" <?php } ?> href = "../tos.html">Patient List</a>
                    <a href = "../tos.html">??</a>
                <?php ; }
            }

            // Clause: Session not Started or Ended
            else{ ?>                                
                <a class = "right" href = "signIn.php">Login</a>
                <a class = "right" href = "patientSignUp.php">Register</a>
            <?php } ?>
            
        </div>

    </body>
</html>