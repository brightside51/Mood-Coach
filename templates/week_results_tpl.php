<section>
    <?php

    // GET VARIABLES FROM SESSION

    global $dbh;
    $dbh = new PDO('sqlite:./sql/database.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare('SELECT name_ FROM User WHERE User.cc_number = $username');
    $stmt->execute();
    $name_user = $stmt->fetch();
    ?>

    <h1><?php echo $name_user . " Results"?></h1>

    <?php
    $stmt = $dbh->prepare('SELECT MAX(week) FROM Test WHERE Test.patient = $username');
    $stmt->execute();
    $week = $stmt->fetch();
    ?>

    <h3><?php echo "Week Number " . $week ?></h3>

    <?php
    // Ver depois como fazer fetch a estes vetores todos...
    foreach($dates as $date)
    {?>
        <h5><?php echo $date ?></h5>
        <ol>
            <?php
            foreach($questions as $question)
            {
                foreach($given_answers as $given_answer)
                {?>
                    <li><?php echo ($question . " " . $given_answer) ?></li>
                <?php } 
            }?>
        </ol>
    <?php } ?>
</section>