<?php
    include('homepageHeader_tpl.php');
    $_SESSION['page'] = 'forum';
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>
<html>   
    <body>
    <div class= "">
        <h1> Forum </h1>
        <fieldset>
            <div>
            <form action="action_post.php">
                <label for="post">Post a quetion or thought</label>
                <br>
                <input type="text" id="" name = "post" require>
                <input type="submit" value = "Post">           
            </form>       
            <fieldset>
            <legend>Post <?php echo $postInfo['post_id']?></legend>
            <div>
                <textarea name="" id="" cols="30" rows="10">
                <?php echo $postInfo['text_']?>
            </textarea>              
            </div>
            <div>
            <form action="action_comment">
                <label for="comment">Write a comment</label>
                <br>
                <input type="text" name="comment">  
                <input type="submit" value = "Comment">
            </form>
            <div>   
        </fieldset>     
    </div>
    </body>
</html>