<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Mood Coach | In-Menu Header Template</title>

        <!-- CSS Styling -->
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/main_style.css">
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    </head>

    <body>

        <!-- Welcome Message -->
        <div class = "header">

            <? php /* <?php   if($usertype == 1){$msg = "Welcome Dr.".$name ;}
                    else{$msg = "Welcome ".$name ;}?>
            <h5><?php echo "Name: $usertype" ?></h5> */ ?>

            <!-- <h1 class = "animated fadeInUp"><?php echo $msg ?></h1> -->
        </div>
        
        <!-- Navigation Bar -->
        <div class = "navbar">
            <a href = "homepage.php">Logout</a>
            <a href = "homepage.php" class = "left"><img src = '../images/cover1.jpg'></a>
        </div>

    </body>
</html>