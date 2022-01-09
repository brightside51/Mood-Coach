<?php
  // init database first: sqlite3 -init database.sql database.db
  /*$dbh = new PDO('sqlite:./sql/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Fetch test questions from the database, according to the date
  $stmt = $dbh->prepare('SELECT * ');*/

  // Post test answers into the database, according to the date


  // Generate feedback 

  // GET VARIABLES FROM SESSION
  // private $user = username;

  class Test
  {
      public function getQuestions()
      {
          global $dbh;
      }
  }

?>