<html>   
    <?php
    /* start_session() */
    include('header_tpl.php');
    ?>
    
    <body>
        <div class = "navbar">   
            <a href = "organizations_tpl.php">Support</a>
            <a href = "forum_tpl.php">Foruns</a>
            <a href = "../database/homepage.html" class = "left">Homepage</a>
        </div>  

        <div class= "">
            <h1> Forum </h1>

            <form action="">
            <input type="text" value = "Write something" name = "post">
            <input type="submit" value = "Post">           
            </form>
        
     </div>
    </body>
    <?php
    /* require('init.php')
    $post_content = $_POST ['']
    function insertPost()
    {   
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Post(text_, user) VALUES (?, ?)');
        $stmt->execute(array($post_content, $_SESSION ["username"]));}
    
        try{insertUser($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor);
    } 
    catch(PDOException $e) {echo $e;} */
?>  

</html>