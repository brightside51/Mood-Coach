<html>   
    <?php
    // start_session() 
    include('inMenuHeader_tpl.php');
    include('footer_tpl.php');
    ?>
    
    <div class= "">
        <h1> Forum </h1>
        <form action="action_post.php">
            <label for="post">Post a quetion or thought</label>
            <br>
            <input type="text" id="" name = "post" require>
            <input type="submit" value = "Post">           
        </form>
        
    </div>
    </body>

</html>