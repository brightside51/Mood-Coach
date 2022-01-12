<?php

    session_start();

    /* Input Obtainal */
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $doctor = $_POST['doctor'];
    $health_number = $_POST['health_number'];
    $date_birth = $_POST['birthdate'];
    $address = $_POST['address'];
    $usertype = 0;

    /* SQLite Database Access */
    $dbh = new PDO('sqlite:sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    // Functions HERE??????????????????


    /* Doctor CC Number Obtainal through Name */
    $stmt = $dbh->prepare('SELECT * FROM User WHERE name_ = ?');
    $stmt->execute(array($doctor));
    $rowUser = $stmt->fetch(); $doctor_cc = $rowUser['cc_number'];

    /* Increment in Doctor's Number of Assigned Patients */
    $stmt = $dbh->prepare('SELECT * FROM HealthProfessional WHERE cc_number = ?');
    $stmt->execute(array($doctor_cc));
    $rowHP = $stmt->fetch(); $patients_assigned = $rowHP['patients_assigned'] + 1;
    $stmt = $dbh->prepare('UPDATE HealthProfessional SET patients_assigned = ? WHERE cc_number = ?');
    $stmt->execute(array($patients_assigned, $doctor_cc));
    

    /* [Test] Variable Input Printing */
    /* ?><h5><?php echo "Name: $name" ?></h5><?php */

    /* Data Input Function into SQL Database */
    function insertPatient($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor_cc, $usertype)
    {   global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User(cc_number, password_, name_, phone_number, email, usertype) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($cc_number, sha1($password), $name, $phone_number, $email, $usertype));
        $stmt = $dbh->prepare('INSERT INTO Patient(cc_number, health_number, date_birth, address_, doctor) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($cc_number, $health_number, $date_birth, $address, $doctor_cc));
    }
    
    /* Data Input into SQL Database */
    try{    insertPatient($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor_cc, $usertype);
            $_SESSION["msg"] = "Registration Successful!";
    } catch(PDOException $e)
    {echo $e;}

    /* Redirecting the User to the Menu */
    header('Location:database/patientMenu.php');
?>