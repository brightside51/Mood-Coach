<?php
session_start();
$dbh = new PDO('sqlite:sql/moodCoach.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$post_content = $_POST['post'];
$user_cc = $_SESSION['cc_number'];
$username = $_SESSION['name'];
$date = date("h:i:sa, d/m/Y");

function insertPost($post_content, $user_cc, $username, $date)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Post(text_, user, username, createdOn) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($post_content, $user_cc, $username, $date));
}

if (isset ($_POST['postBt']))
{
    try {
        insertPost($post_content, $user_cc, $username, $date);
    } catch(PDOExecption $e) {
    }
    header('Location:templates/forum_tpl.php');
}
?>
