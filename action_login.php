<?php

    /* Input Obtainal */
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];

    /* SQLite Database Access */
    global $dbh;
    $dbh = new PDO('sqlite:../sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /* Data Output from SQL Database - Selecting All Users */
    /*
    try{
        $stmt = $dbh->prepare('SELECT * FROM User WHERE cc_number = ?');
        $stmt->execute(array($cc_number));
        $result = $stmt->fetch();
        print_r($result);}
    catch (PDOException $e){ ?> <h5 style = "color: #FF0000">Invalid Parameters</h5> <?php }
    */

    /* E */

?>