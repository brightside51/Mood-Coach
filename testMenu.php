<?php
  session_start();  
  $_SESSION['page'] = 'test';
  require_once('database/test.php');

  $username = $_SESSION['cc_number'];

  $test_count = getPreviousTestCount($username);
  $_SESSION['test_count'] = $test_count;
  
  // Template Related
  include('templates/homepageHeader_tpl.php');
  include('templates/testMenu_tpl.php');
  include('templates/footer_tpl.php');
?>