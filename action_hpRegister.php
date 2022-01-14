<?php

    session_start();

    // Input Obtainal
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $license_id = $_POST['license_id'];
    $workplace_id = $_POST['workplace_id'];
    $patients_assigned = 0;
    $usertype = $_SESSION['sel_usertype'];
    $_SESSION['usertype'] = 1;

    // SQLite Database Access
    $dbh = new PDO('sqlite:sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Data Input Function into SQL Database
    function insertHP($cc_number, $password, $name, $phone_number, $email, $license_id, $workplace_id, $patients_assigned, $usertype)
    {   global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User(cc_number, password_, name_, phone_number, email, usertype) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($cc_number, sha1($password), $name, $phone_number, $email, $usertype));
        $stmt = $dbh->prepare('INSERT INTO HealthProfessional(cc_number, license_id, workplace_id, patients_assigned) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($cc_number, $license_id, $workplace_id, $patients_assigned));
    }

    // Search for CC Number inside the User Class
    function findCC($cc_number)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ?');
        $stmt->execute(array($cc_number));
        return $stmt->fetch();
        // This value will be False if no corresponding CC Number is found
    }
    
    // Data Input into SQL Database
    try
    {
        insertHP($cc_number, $password, $name, $phone_number, $email, $license_id, $workplace_id, $patients_assigned, $usertype);
        $_SESSION['name'] = $name;
        $_SESSION['cc_number'] = $cc_number;

        // Redirecting the Doctor back to Homepage
        header('Location:database/homepage.php');
    }
    catch(PDOException $e)
    {
        //echo $e->getMessage();
        $_SESSION['regError'] = "Failed Registration!";

        // User with this CC Number Already exists
        if(findCC($cc_number))
        {
            $_SESSION['regError'] = "CC Number: $cc_number";
        }
        
        
        // Redirecting the Doctor back to Registration
        header('Location:database/hpSignUp.php');
    }
?>