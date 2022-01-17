<?php
require('../database/init.php');

function getPost()
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Post');
    $stmt->execute();
    $postInfo = $stmt->fetchAll();
    return($postInfo);
}

$postInfo = getPost();