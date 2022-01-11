<form action = "database\test.php" method = "post" id = "test">
    <ol>
        <?php
        // Fetch $questions and $answers from database
        foreach ($questions as $question) { ?>
            <li>
                <h3><?php echo $question ?></h3>
                <div>
                    <?php foreach($answers as $answer) {?>
                        <input type = "radio"
                            name = "test_answers"
                            value = "<?php $answer ?>"><?php echo $answer ?>
                    <?php } ?>
                </div>
            </li>
            <?php } ?>

                <?php
                /*
                CHECK
                https://webdevtrick.com/simple-quiz-in-php-source-code/

                <li>
                    <h3>Question 1</h3>
                    <div>
                        <input type = "radio" name = "q1-answers" value = "Strongly Disagree">Strongly Disagree
                        <input type = "radio" name = "q1-answers" value = "Disagree">Disagree
                        <input type = "radio" name = "q1-answers" value = "Neutral">Neutral
                        <input type = "radio" name = "q1-answers" value = "Agree">Agree
                        <input type = "radio" name = "q1-answers" value = "Strongly Agree">Strongly Agree
                    </div>
                </li>

                <li>
                    <h3>Question 2</h3>
                    <div>
                        <input type = "radio" name = "q2-answers" value = "Strongly Disagree">Strongly Disagree
                        <input type = "radio" name = "q2-answers" value = "Disagree">Disagree
                        <input type = "radio" name = "q2-answers" value = "Neutral">Neutral
                        <input type = "radio" name = "q2-answers" value = "Agree">Agree
                        <input type = "radio" name = "q2-answers" value = "Strongly Agree">Strongly Agree
                    </div>
                </li>
                */?>

    </ol>

    <input type = "submit" value = "Send">
</form>

<?php
foreach($answers as $answer)
{
    $given_answers = $_POST['test_answers'];
}
?>