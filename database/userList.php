<?php

    // SQL Database Access
    $dbh = new PDO('sqlite:../sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Create 2D Array containing all Health Professionals
    function getHPList()
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE usertype = ?');
        $stmt->execute(array(1));
        $hpList = $stmt->fetchAll();
        return($hpList);
    }

    function getPatientList($doctor)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Patient WHERE doctor = ?');
        $stmt->execute(array($doctor));
        $patientList = $stmt->fetchAll();
        return($patientList);
    }

    function getExtraPatientList($cc_number)
    {   global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ?');
        $stmt->execute(array($cc_number));
        $extraPatientList = $stmt->fetch();
        return($extraPatientList);
    }

?>