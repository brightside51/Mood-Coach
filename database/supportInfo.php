<?php
    require('../database/init.php');

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