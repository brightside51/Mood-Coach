<?php
require_once('../database/init.php');
/* $post_id = $_POST['post_id']; */

function getComment()
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Comment');
    $stmt->execute();
    $commentInfo = $stmt->fetchAll();
    return($commentInfo);
}

$commentInfo = getComment();
/* print_r($commentInfo); */