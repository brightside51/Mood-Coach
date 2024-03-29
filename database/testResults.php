<?php
    session_start();
    require_once('test.php');

    $username = $_SESSION['cc_number'];
    $username = intval($username);

    $test_count = $_SESSION['test_count'];

    $qid = generateQuestionID($test_count);

    $given_answers = array();
    foreach($qid as $q)
    {
        $answer = getTestAnswers($username, $q);
        array_push($given_answers, $answer);
    }

    // Template Related
    include('../templates/homepageHeader_tpl.php');
    include('../templates/testResults_tpl.php');
    include('../templates/footer_tpl.php');
?>

<html>
  <!-- Page Information and Style -->
  <head>
      <meta charset = "utf-8">
      <title>Mood Coach | Test Results</title>
      <meta name = "viewport"
      content = "width=device-width, initial-scale=1">
  </head>
</html>