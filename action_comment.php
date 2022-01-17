<?php
session_start();
$dbh = new PDO('sqlite:sql/moodCoach.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$comment_content = $_POST['comment'];
$user_cc = $_SESSION['cc_number'];
$username = $_SESSION['name'];
$post_id = $_POST['post_id'];
$date = date("h:i:sa, d/m/Y");

function insertComment($comment_content, $user_cc, $username, $post_id, $date)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Comment(text_, user, username, post_id, createdOn) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute(array($comment_content, $user_cc, $username, $post_id, $date));
}

if (isset ($_POST['commentBt']))
{
    try {
        insertComment($comment_content, $user_cc, $username, $post_id, $date);
    } catch(PDOExecption $e) {
    }
    header('Location:templates/forum_tpl.php');
}
?>
