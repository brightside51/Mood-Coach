<?php

    session_start();
    //require_once('database/test.php');

    // --------------------------------------------------------------------------------------
    // Instead of Requiring 'test.php'
    // --------------------------------------------------------------------------------------

    // SQLite Database Access
    $dbh = new PDO('sqlite:sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Get Test ID
    // There is one test per day of the week (total of 7)
    function getTestID($test_count)
    {
        $test_id = $test_count + 1;
        return $test_id;
    }

    // To further insert answers into the database
    // Generate Question ID & Patient Username Array
    function generateQuestionID($test_id)
    {
        $qid = array();
        for($i = 1; $i <= 20; $i++)
        {
            array_push($qid, intval(strval($i) . strval($test_id)));
        }
        return ($qid);
    }

    function generateAnswerID($qid, $test_id, $username)
    {
        $ans_id = array();
        foreach($qid as $q)
        {
            array_push($ans_id, intval(strval($q) . strval($test_id) . strval($username)));
        }
        return ($ans_id);
    }

    function generatePatientArray($username)
    {
        $patientArray = array();
        for($i = 1; $i <= 20; $i++)
        {
            array_push($patientArray, $username);
        }
        return ($patientArray);
    }

    // Post Test Answers into the Database
    function postGivenAnswers($ans_id, $answers, $patientArray, $qid)
    {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Answer(ans_id, given_answer, cc_number, id) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($ans_id, $answers, $patientArray, $qid));
    }

    // Update Test Count
    function updateTestCount($test_count, $username)
    {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Patient SET test_count = ? WHERE cc_number = ?');
        $stmt->execute(array($test_count, $username));
    }

    // --------------------------------------------------------------------------------------

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

    header('Location:database/testCompleted.php');
?>