<?php
    include('homepageHeader_tpl.php');
    $_SESSION['page'] = 'forum';
    include('footer_tpl.php');
    require('../database/getPost.php'); 
    require('../database/getComment.php');
?>
<html>   
    <body>
    <div class= "container-forum">
        <h1> Forum </h1>
        <br>
        <div  class="row">
            <div> 
                <br>
                <form method = "post" action = "../action_post.php"> 
                    <input type="text" class = "addPost" name = "post" placeholder = "Add a post"> 
                    <input type="submit" class = "postBt" name = "postBt" value = "Add Post">
                </form>
            </div>
        <?php foreach($postInfo as $pI){?>
                <div class = "row">
                    <div class = "userPost" >
                        <div class="post">
                            <div class="user">
                                <b><?php echo($pI['user'])?></b>
                                <span class = "time">time</span>
                            </div>
                        <div class = "userPost">
                            <?php echo $pI['text_'];?>
                        </div>
                        <div class = "comments">
                            <div>
                                <form method = "post" action="../action_comment.php">
                                    <input type="text" class = "addPost" name = "comment" placeholder = "Comment post"> 
                                    <input type="submit" class = "postBt" name = "commentBt" value = "Add Comment">
                                </form>
                            </div>
                            <?php foreach($commentInfo as $cI){?>
                                <div class = "row">
                                    <div class = "userPost" >
                                        <div class="post">
                                            <div class="user">
                                                <b><?php echo($cI['user'])?></b>
                                                <span class = "time">time</span>
                                            </div>
                                    <div class = "userPost">
                                        <?php echo $pI['text_'];?>
                                    </div>
                                    <?php }?>
                            </div>
                    </div>
                </div>
            <?php }?>
            </div>
        <!-- <form action="action_post.php">
            <label for="post">Post a quetion or thought</label>
            <br>
            <input type="text" id="" name = "post" cols="100" rows="2" require>
            <br>
            <input class = "postBt" type="submit" value = "Post">           
        </form>       
            <fieldset>
            <legend>Post <?php echo $postInfo['post_id']?></legend>
            <div>
                <textarea name="" id="" cols="100" rows="2">
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
        </fieldset>      -->
    </div>
    </body>
</html>