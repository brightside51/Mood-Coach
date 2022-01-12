<?php

    session_start();

    /* Input Obtainal */
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];

    /* SQLite Database Access */
    global $dbh;
    $dbh = new PDO('sqlite:sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /* Search for CC Number inside the User Class */
    function findUser($cc_number, $password)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ? AND password_ = ?');
        $stmt->execute(array($cc_number, sha1($password)));
        return $stmt->fetch();
        // This value will be False if no corresponding User is found
    }

    /* Search for CC Number inside the Patient Subclass */
    function findCC($cc_number)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Patient WHERE cc_number = ?');
        $stmt->execute(array($cc_number));
        return $stmt->fetch();
        // This value will be False if no corresponding CC Number is found
    }

    // -------------------------------------------------------
    
    // Login Functionality Clauses
    $row = findUser($cc_number, $password);
    if ($row)       // User Found
    {
        $_SESSION['cc_number'] = $cc_number;
        $_SESSION['usertype'] = $row['usertype'];
        print_r($cc_number);
        //if ($_SESSION['usertype'] == 0){header('Location: database/patientMenu.php');}
        //else{header('Location: database/hpMenu.php');}
    }

    else            // User Not Found
    {
        // Wrong CC Number
        print_r($cc_number); print_r($password);
        /*
        if(findCC($cc_number))
        {
            $_SESSION['logError'] = "Invalid CC Number: Please ";
        }
        else
        {

        }
        header('Location: database/signIn.php');
        */
        
    }

?>