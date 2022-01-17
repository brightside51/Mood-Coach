<?php
    session_start();
    require_once('database/test.php');

    $test_count = $_SESSION['test_count'];
    
    // Template Related
    include('templates/homepageHeader_tpl.php');
    include('templates/feedback_tpl.php');
    include('templates/footer_tpl.php');
?>