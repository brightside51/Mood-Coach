<form action = "action_submitTestAnswers.php" method = "post" id = "test">
    <ol>
        <?php

        // Fetch Questions from the Database
        $questions = getQuestions($test_id);

        // TESTAR!!! Tentar fazer o test_answers como um array
        foreach ($questions as $question) 
        { ?>
            <li>
                <h3><?php echo $question ?></h3>
                <div>
                    <input type = "radio" required = true name = "test_answers" value = "Strongly Disagree">Strongly Disagree
                    <input type = "radio" required = true name = "test_answers" value = "Disagree">Disagree
                    <input type = "radio" required = true name = "test_answers" value = "Neutral">Neutral
                    <input type = "radio" required = true name = "test_answers" value = "Agree">Agree
                    <input type = "radio" required = true name = "test_answers" value = "Strongly Agree">Strongly Agree
                </div>
            </li>
            <?php } ?>
    </ol>
    <input type = "button" value = "Send">
</form>
