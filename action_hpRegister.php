<?php

    session_start();

    /* Input Obtainal */
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $license_id = $_POST['license_id'];
    $workplace_id = $_POST['workplace_id'];
    $patients_assigned = 0;
    $usertype = 1;

    /* SQLite Database Access */
    $dbh = new PDO('sqlite:sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /* Data Input Function into SQL Database */
    function insertHP($cc_number, $password, $name, $phone_number, $email, $license_id, $workplace_id, $patients_assigned, $usertype)
    {   global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User(cc_number, password_, name_, phone_number, email, usertype) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($cc_number, sha1($password), $name, $phone_number, $email, $usertype));
        $stmt = $dbh->prepare('INSERT INTO HealthProfessional(cc_number, license_id, workplace_id, patients_assigned) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($cc_number, $license_id, $workplace_id, $patients_assigned));
    }
    
    /* Data Input into SQL Database */
    try
    {
        insertPatient($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor_cc, $usertype);
        $_SESSION["welcomeMsg"] = "Welcome Dr. $name";
        header('Location:database/hpMenu.php');        /* Redirecting the Doctor to the Menu */
    }
    catch(PDOException $e)
    {

        // IF Clause for when User already exists

        echo $e->getMessage();
        $_SESSION['regError'] = "Failed Registration!";
        header('Location:database/hpSignUp.php');      /* Redirecting the Doctor back to Registration */
    }
?>