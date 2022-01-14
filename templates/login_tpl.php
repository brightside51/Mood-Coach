<?php
    session_start();
    $cc_numberError = $_SESSION['cc_numberError'];
    unset($_SESSION['cc_numberError']);
?>

<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Mood Coach | Login Information Template</title>

        <!-- CSS Styling -->
        <link rel = "stylesheet" type = "text/css" href = "../css/form_style.css">
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    </head>

    <body>

        <div class="inner-wrap">

            <!-- CC Number Input -->
            <label for = "cc_number">Citizen's Card Number
            <input type = "number" id = "cc_number" name = "cc_number"
            min = "10000000" max = "99999999" value = <?php echo $cc_numberError; ?> required/></label>

            <!-- Password Input -->
            <label for = "password">Password
            <input type = "password" id = "password" name = "password" required></input></label>
        
        </div>

        <!---------------------------------------------------->

        <!-- Submit Button -->
        <div class="button-section">
            <a href = "homepage.html"><input type="submit" name="submit" value = "Done!"></a>
            <span class="privacy-policy">
            <input type="checkbox" name="tos">You agree to our <a href = ../tos.html>Terms of Service</a>. 
            </span>
        </div>

    </body>
</html>