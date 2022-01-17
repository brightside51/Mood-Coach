<?php
require('../database/init.php');
$post_content = $_POST ['post'];

function insertPost($post_content, $username)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Post(text_, user) VALUES (?, ?)');
    $stmt->execute(array($post_content, $username));
    return $stmt-> lastInsertedId();
}

function getPost($lastId)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Post');
    $stmt->execute();
    $postInfo = $stmt->fetchAll();
    return $postInfo[$lastId];
}

if (isset ($_POST['post']))
{
    $lastId = insertPost($post_content, $_SESSION['username']);
}
header('Location:templates/forum_tpl.php');
$postInfo = getPost($lastId);
?>
