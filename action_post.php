<?php 
require('init.php')
$post_content = $_POST ['']
function insertPost()
    {   
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Post(text_, user) VALUES (?, ?)');
        $stmt->execute(array($post_content, $_SESSION ["username"]));}
        try{insertUser($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor);
    } 
    catch(PDOException $e) {echo $e;} 
    ?> 