<?php 

    session_start();
    require_once('../database/init.php');

    //$dbh = new PDO('sqlite:../sql/moodCoach.db');
    //$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get Test ID
    // There is one test per day of the week (total of 7)
    function getTestID($test_count)
    {
        $test_id = $test_count + 1;
        return $test_id;
    }

    // Fetch Test Questions from the Database
    // According to the Test ID, and, thus, according to the day of the week
    function getQuestions($test_id)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT id, content FROM Question WHERE Question.test_id = ?');
        $stmt->execute(array($test_id));
        $questions = $stmt->fetchAll();

        return $questions;
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

    function getPreviousTestCount($username)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Patient WHERE Patient.cc_number = ?');
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        return $row['test_count'];
    }

    // Update Test Count
    function updateTestCount($test_count, $username)
    {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Patient SET test_count = ? WHERE cc_number = ?');
        $stmt->execute(array($test_count, $username));
    }

    // Get Weekly Results from the Database
    function getTestAnswers($username, $qid)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT given_answer FROM Answer WHERE ((Answer.cc_number = ?) AND (Answer.id = ?))');
        $stmt->execute(array($username, $qid));
        $given_answers = $stmt->fetchAll();

        return $given_answers;
    }

    // Get Feedback from the Database
    /* 
    ! Feedback won't be posted from the health professional, as initially desired !
      There will be various feedbacks present in the database.
      When the function getFeedback() is called, all those feedbacks inserted 
      into the database are now stored into an array.
    */
  
    function getFeedback()
    {
        // Feedback won't be posted from the health professional, as initially desired!
        global $dbh;
        $stmt = $dbh->prepare('SELECT diagnosis, prescription, advice FROM Feedback');
        $stmt->execute();
        $feedback = $stmt->fetchAll();

        return $feedback;
    }

?>