<?php
require('../database/init.php');

function getComment()
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Comment');
    $stmt->execute();
    $commentInfo = $stmt->fetchAll();
    return($commentInfo);
}

$commentInfo = getComment();