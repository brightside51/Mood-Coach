<?php

// Prints on the browser this variable
var_dump($_POST['test_answers']);
die();

/*
// Post test answers into the database
if(isset($_POST['test_answers']) && !empty($_POST['test_answers']))
{
    
}

function postGivenAnswers($questions, $answers)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Question (content, answer) VALUES (?, ?)');
    $stmt->execute(array($questions, $answers));
}

// Save date of the first test of the week
if($test_count == 0)
{
    $firsttestofweek = date('Y-m-d');
}

// Count Another Completed Test
$test_count++;

?>
*/