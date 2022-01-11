<form action = "database\test.php" method = "post" id = "test">
    <ol>
        <?php
<<<<<<< Updated upstream
        // Fetch $questions and $answers from database
        $questions = getQuestions($test_id);
        $answers = getPossibleAnswers();

        foreach ($questions as $question) { ?>
=======
        // Get Questions and Answers from database
        $questions = getQuestions($test_id);
        $answers = getPossibleAnswers();

        // Build HTML Structure for the Test
        foreach ($questions as $question) 
        { ?>
>>>>>>> Stashed changes
            <li>
                <h3><?php echo $question ?></h3>
                <div>
                    <?php
                    foreach($answers as $answer) 
                    {?>
                        <input type = "radio"
                            name = "test_answers"
                            value = "<?php $answer ?>"><?php echo $answer ?>
                    <?php } ?>
                </div>
            </li>
<<<<<<< Updated upstream
            <?php } ?>
=======
        <?php } ?>
>>>>>>> Stashed changes
    </ol>

    <input type = "submit" value = "Send">
</form>

<?php
<<<<<<< Updated upstream
=======
// Post Given Answers in the Database
>>>>>>> Stashed changes
postGivenAnswers($questions, $given_answers, $test_count);
?>

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