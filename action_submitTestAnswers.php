<?php

// Post test answers into the database
$answers = $_POST['test_answers'];
$qid = generateQuestionID($test_id);
postGivenAnswers($answers, $qid);

header('Location: testCompleted.php');

/*
// Save date of the first test of the week
if($test_count == 0)
{
    $firsttestofweek = date('Y-m-d');
}

// Count Another Completed Test
$test_count++;
*/
?>