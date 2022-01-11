<?php 
  // GET VARIABLES FROM SESSION

  // Connect to the Database
  // Initialize database first: sqlite3 -init database.sql database.db
  $dbh = new PDO('sqlite:./sql/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Generate Test ID
  function getTestID($username, $test_count)
  {
      if($test_count == 0)
      {
          $firsttest_date = date('Y-m-d');
      }
      else
      {   
          $test_date = date('Y-m-d');   // Time stamp with today's date
          $test_id = $username . "_" . $test_date;
      }
      return $test_id;
  }

  // Fetch test questions from the database
  function getQuestions($test_id)
  {
      global $dbh;
      $stmt = $dbh->prepare('SELECT content 
                            FROM Question WHERE Question.test_id = ?');
      $stmt->execute(array($test_id));
      $questions = $stmt->fetchAll();

      return $questions;
  }

  // Get possible answers for every question from the database
  function getPossibleAnswers()
  {
      global $dbh;
      $stmt = $dbh->prepare('SELECT answer FROM Question');
      $stmt->execute();

      return $stmt->fetchAll();
  }

  // Post test answers into the database
  function postGivenAnswers($questions, $given_answers, $test_count)
  {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Question (content, given_answer) VALUES (?, ?)');
    $stmt->execute(array($questions, $given_answers));

    // Count Another Completed Test
    $test_count++;
  }

  // Get feedback of that week of tests
  function getFeedback($test_id)
  {
      // Feedback won't be posted from the health professional, as initially desired!
      global $dbh;
      $stmt = $dbh->prepare('SELECT diagnosis, prescription, advice FROM Feedback WHERE Feedback.test_id = ?');
      $stmt->execute(array($test_id));
      $feedback = $stmt->fetchAll();

      return $feedback;
  }
?>