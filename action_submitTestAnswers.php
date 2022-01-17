<?php

    session_start();
    require_once('database/test.php');

    // Post test answers into the database
    $test_count = $_SESSION['test_count'];
    $test_id = getTestID($test_count);
    
    $answers = $_POST['test_answers'];
    $username = $_SESSION['cc_number'];

    $qid = generateQuestionID($test_id);
    $ans_id = generateAnswerID($qid, $test_id, $username);
    $patientArray = generatePatientArray($username);

    for($i = 0; $i < 20; $i++)
    {
        postGivenAnswers($ans_id[$i], $answers[$i], $patientArray[$i], $qid[$i]);
    }

    // Update Test Count
    $test_count = $test_count + 1;
    $_SESSION['test_count'] = $test_count;
    updateTestCount($test_count, $username);    // Update on the Database

    header('Location: testCompleted.php');

?>