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
      $stmt = $dbh->prepare('SELECT MAX(week) FROM Test WHERE Test.patient = $cc_number');
      $stmt->execute();
      $week = $stmt->fetch();

      $test_id = $cc_number . "_" . $week . "_" . $loginDate;
      
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
      $count = 0;
      $count = $count + 1; 
      // Cada vez que se submetem testes contabilizar, dar reset após ser dado um feedback
  }

  // Generate feedback according to the answers
  function getFeedback($test_id)
  {
      // Feedback won't be posted from the health professional!
      global $dbh;
      $stmt = $dbh->prepare('SELECT diagnosis, prescription, advice FROM Feedback WHERE $test_id = Feedback.test_id');
      $stmt->execute();
    
      //$week = $week + 1;
      // só é dado um feedback se, pelo menos, 5 testes tiverem sido submetidos
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