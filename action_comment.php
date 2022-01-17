<?php 
require('../database/init.php');
$comment_content = $_POST ['comment'];

function insertComment($comment_content, $username)
{   
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Comment(text_, user) VALUES (?, ?)');
    $stmt->execute(array($comment_content, $username));
    return $stmt-> lastInsertedId()
}

function getComment($lastId)
{
    $stmt = $dbh->prepare('SELECT * FROM Comment');
    $stmt->execute();
    $commentInfo = $stmt->fetchAll();
    return $commentInfo[$lastId];
}

if (isset ($_POST['post'])){
    $lastId = insertComment($comment_content, $_SESSION['username']);
    $commentInfo = getComment();
}

?> 

<html>
    <fieldset>
        <legend> <?php echo $commentInfo['user']?></legend>
        <textarea name="" id="" cols="30" rows="10">
            <?php echo $commentInfo['text_']?>
        </textarea>  
    </fieldset> 
</html>
