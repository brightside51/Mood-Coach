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

    /* Search for a User (CC Number and Password) inside the User Class */
    function findUser($cc_number, $password)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ? AND password_ = ?');
        $stmt->execute(array($cc_number, sha1($password)));
        return $stmt->fetch();
        // This value will be False if no corresponding User is found
    }

    /* Search for CC Number inside the User Class */
    function findCC($cc_number)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ?');
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
        $usertype = $row['usertype']; $_SESSION['usertype'] = $usertype;
        $test_count = $row['test_count']; $_SESSION['test_count'] = $test_count;
        $name = $row['name_']; $_SESSION['name'] = $name;
        
        // Redirecting the User back to Homepage
        header('Location:database/homepage.php');
    }

    else            // User Not Found
    {

        // Wrong Password       
        if(findCC($cc_number))
        {
            $_SESSION['logError'] = "Invalid Password";
            $_SESSION['cc_numberError'] = $cc_number;
        }
        // Wrong CC Number
        else        
        {
            $_SESSION['logError'] = "Invalid CC Number";
        }

        // Redirecting the User back to Login
        header('Location: database/signIn.php');
    }
?>