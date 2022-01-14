<?php
    session_start();
    session_destroy();
    header("Location:database/homepage.php");
?>