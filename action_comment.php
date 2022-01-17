<?php
session_start();
$dbh = new PDO('sqlite:sql/moodCoach.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$comment_content = $_POST['comment'];
$user_cc = $_SESSION['cc_number'];

function insertComment($comment_content, $username, $post_id)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Comment(text_, user, post_id) VALUES (?, ?, ?)');
    $stmt->execute(array($comment_content, $user_cc, $post_id));
    $id = $dbh->lastInsertID();
    return $id;
}


if (isset ($_POST['commentBt']))
{
    try {
        $lastCommentId = insertComment($comment_content, $user_cc, $_SESSION['lastId']);
    } catch(PDOExecption $e) {
    }
    header('Location:templates/forum_tpl.php');
}
?>
