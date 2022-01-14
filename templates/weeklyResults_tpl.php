<section>
    <?php
    // VER PRIMEIRO A QUESTÃO DE COMO GUARDAR AS RESPOSTAS!!!!!
    ?>

    <h1><?php "{$_SESSION['name']} Weekly Results"?></h1>

    <?php

    // VER PRIMEIRO A QUESTÃO DE COMO GUARDAR AS RESPOSTAS!!!!!
    $stmt = $dbh->prepare('SELECT MAX(week) FROM Test WHERE Test.patient = $username');
    $stmt->execute();
    $week = $stmt->fetch();
    
    ?>

    <h3><?php echo "Week Number " . $week ?></h3>

    <?php
    
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