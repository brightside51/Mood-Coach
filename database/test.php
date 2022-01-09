<?php 
  // GET VARIABLES FROM SESSION
  // sacar username do paciente e date em que o login é efetuado

  // Connect to the Database
  // Initialize database first: sqlite3 -init database.sql database.db
  $dbh = new PDO('sqlite:./sql/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Generate Test ID
  function generateTestID($username, $loginDate)
  {
      global $dbh;
      $cc_number = $username;
      $stmt = $dbh->prepare('SELECT MAX(date_) FROM Test WHERE Test.patient = $cc_number');
      $stmt->execute();
      $lastTestDate = $stmt->fetch();

      $test_id = $cc_number . ($loginDate - $lastTestDate);
      // ver melhor o operador a usar
      // OU meter um contador cada vez que se submete um teste?
      return $test_id;
  }

  // Fetch test questions from the database
  function getQuestions($test_id)
  {
      global $dbh;
      $stmt = $dbh->prepare('SELECT content 
                            FROM Question WHERE Question.test_id = Test.test_id');
      $stmt->execute();
      $questions = $stmt->fetchAll();
      return $questions;
  }

  // Post test answers into the database
  function postAnswers($test_id)
  {

  }

  // Generate feedback according to the answers
  function getFeedback($test_id, $answers)
  {
      // Feedback won't be posted from the health professional!
      global $dbh;
      $stmt = $dbh->prepare('SELECT diagnosis, prescription, advice FROM Feedback WHERE $test_id = Feedback.test_id');
      $stmt->execute();

  }

  // Call functions and throw exception if necessary
  try
  {

  }
  catch(PDOException $e)
  {
      echo $e;
  }

?>