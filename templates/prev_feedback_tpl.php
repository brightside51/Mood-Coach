<section>
    <?php

    // GET VARIABLES FROM SESSION ($username)

    global $dbh;
    $dbh = new PDO('sqlite:./sql/database.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare('SELECT diagnosis, prescription, advice FROM Feedback WHERE Feedback.patient = $username');
    $stmt->execute();
    $feedback = $stmt->fetch();
    ?>
</section>