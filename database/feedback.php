<?php
    session_start();
    require_once('test.php');

    $test_count = $_SESSION['test_count'];
    
    // Template Related
    include('../templates/homepageHeader_tpl.php');
    include('../templates/feedback_tpl.php');
    include('../templates/footer_tpl.php');
?>

<html>
  <!-- Page Information and Style -->
  <head>
      <meta charset = "utf-8">
      <title>Mood Coach | Test Feedback</title>
      <meta name = "viewport"
      content = "width=device-width, initial-scale=1">

      
  </head>
</html>