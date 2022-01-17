<?php
    session_start();
    $_SESSION['page'] = 'forum';
    include('homepageHeader_tpl.php');
    include('footer_tpl.php');
    require('../database/getPost.php');
    require('../database/getComment.php');
?>

<html>   
    <body>
        <div class= "container-forum"> 
            <b><h1 class = "forum">Forum</h1></b>
            <br>
            <div class = "userPost"> 
                <form method = "post" action = "../action_post.php"> 
                    <input type="text" id = "addPost" name = "post" placeholder = "Add a post"> 
                    <input type="submit" class = "postBt" name = "postBt" value = "Add Post">
                </form>
            </div>
            <div class="userPost">          
                <?php foreach($postInfo as $pI){?>
                <div>
                    <div class="post">
                        <div class="user">
                            <b><?php echo($pI['username'])?></b>
                            <span class = "time"><?php echo($pI['createdOn'])?></span>
                        </div>
                        <div class = "container-post">
                            <p><?php echo $pI['text_'];?></p>
                        </div> 
                        <div class = "comments">
                            <div>
                                <form method = "post" action="../action_comment.php">
                                    <input type= "hidden" name = "post_id" value = "<?php echo($pI['post_id'])?>">
                                    <input type="text" id = "addComment" name = "comment" placeholder = "Comment post"> 
                                    <input type="submit" class = "postBt" name = "commentBt" value = "Add Comment">
                                </form>
                            </div>
                        </div>
                        <div class="userPost">
                            <?php foreach($commentInfo as $cI){
                                if($cI['post_id'] == $pI['post_id']){?>
                                    <div class="post">
                                        <div class="user">
                                            <b><?php echo($cI['username'])?></b>
                                            <span class = "time"><?php echo($cI['createdOn'])?></span>
                                        </div>
                                        <div class = "container-post">
                                            <?php echo($cI['text_'])?>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div> 
                    </div> 
                <?php }?>
            </div>
        </div>
    </body>
</html>