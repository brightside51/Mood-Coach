<?php 

$dbh = new PDO('sqlite:./sql/moodCoach.db');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

  function generateQuestionID($test_id)
  {
    for($i = 1; $i <= 20; $i++)
    {
        $id = array_push($id, $i);
    }
    return ($i . $test_id);
  }
  
    // Post Quiz Answers into the Database
    function postGivenAnswers($answers, $qid)
    {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Question SET answer = ? WHERE Question.id = ?');
        $stmt->execute(array($answers, $qid));
    }

  // Get Feedback from the Database
  /* ! Feedback won't be posted from the health professional, as initially desired !
       There will be various random feedbacks present in the database.
       When the function getFeedback() is called, all those random feedbacks previouly inserted
       into the database are stored into an array.
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

    // CHECK NO. OF WEEKS AND DATES
    // VARIABLES NEED TO INITIALIZED IDK WHERE!
    if($test_date - $firsttestofweek == 7)
    {
        // Reset Test Counter
        $test_count = 0;

        // Meaning a week of tests has passed
        $week++;

        // Clear date variables
        unset($test_date, $firsttestofweek);
    }
?>