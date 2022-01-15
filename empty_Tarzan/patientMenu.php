<?php session_start(); ?>

<!-- Patient Menu Page -->
<!-- http://localhost:8080/moodcoach/database/patientMenu.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Patient Menu</title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>

        <h5><?php echo "Name: {$_SESSION['cc_number']}"; ?></h5>
        
        <!-- In-Menu Header Template -->
        <?php include('../templates/inMenuHeader_tpl.php') ?>



        <!-- Footnotes/Footer -->
        <?php include('../templates/footer_tpl.php')?>

    </body>
</html>