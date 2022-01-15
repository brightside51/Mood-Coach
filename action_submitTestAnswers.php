<?php

// Post test answers into the database
if(isset($_POST['test_answers']) && !empty($_POST['test_answers']))
{
    $answers_byID = $_POST['test_answers'];
}

// Save date of the first test of the week
if($test_count == 0)
{
    $firsttestofweek = date('Y-m-d');
}

// Count Another Completed Test
$test_count++;

?>