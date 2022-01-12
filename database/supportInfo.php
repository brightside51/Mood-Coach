<?php
    $dbh = new PDO('sqlite:../sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    function getOrganization(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Organization');
        $stmt->execute();
        $organization = $stmt->fetchAll();
        return($organization);
    } 

    function getSupportLine(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM SupportLine');
        $stmt->execute();
        $supportLine = $stmt->fetchAll();
        return($supportLine);
    }
    
    $organization = getOrganization();
    $supportLine = getSupportLine();
?>