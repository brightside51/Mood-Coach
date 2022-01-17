<?php require_once('../database/test.php');?>

<div class = "form-section gender" id = "testForm">
    <form action = "../action_submitTestAnswers.php" method = "post">
        <ol>
            <?php

            // Fetch Questions from the Database
            $test_id = getTestID($test_count);
            $questions = getQuestions($test_id);

            // Display Questions and Possible Answers
            foreach ($questions as $key => $value) 
            { ?>
                <li>
                    <h3><?php echo $value['content'] ?></h3>
                    <div>
                        <input type = "radio" required = true name = "test_answers[<?php echo $key ?>]" value = "Strongly Disagree">Strongly Disagree
                        <input type = "radio" required = true name = "test_answers[<?php echo $key ?>]" value = "Disagree">Disagree
                        <input type = "radio" required = true name = "test_answers[<?php echo $key ?>]" value = "Neutral">Neutral
                        <input type = "radio" required = true name = "test_answers[<?php echo $key ?>]" value = "Agree">Agree
                        <input type = "radio" required = true name = "test_answers[<?php echo $key ?>]" value = "Strongly Agree">Strongly Agree
                    </div>
                </li>
                <?php } ?>
        </ol>
        <input class = "sendTest" type = "submit" value = "Send">
    </form>
</div>
