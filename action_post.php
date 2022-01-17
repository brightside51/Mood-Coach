<?php
session_start();
$dbh = new PDO('sqlite:sql/moodCoach.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$post_content = $_POST['post'];
$user_cc = $_SESSION['cc_number'];


function insertPost($post_content, $user_cc)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Post(text_, user) VALUES (?, ?)');
    $stmt->execute(array($post_content, $user_cc));
    $id = $dbh->lastInsertID();
    return $id;
}

if (isset ($_POST['postBt']))
{
    try {
        $lastId = insertPost($post_content, $user_cc);
        $_SESSION['lastId'] = $lastId;
    } catch(PDOExecption $e) {
    }
    header('Location:templates/forum_tpl.php');
}
?>
