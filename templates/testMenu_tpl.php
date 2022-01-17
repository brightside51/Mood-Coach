<div id = "testMenu">
    <section id = "feedbackProgress">
        <?php
        // All the tests are completed, no more allowed
        // The user can still check his results and feedback
        if ($test_count == 7)
        { ?>
            <h1>You have completed all the tests in the platform.</h1>
            <progress 
                max = "100" value = <?php echo ($test_count / 7) * 100 ?>>
            </progress>
            <div>
                <h3>Check all your results and feedback below</h3>
                <a class = resultsButton href = "testResults.php">Test Results</a>
                <a class = feedbackButton href = "feedback.php">Feedback</a>
            </div>
        <?php }

        else if ($test_count < 7)
        { ?>
            <h1>You have completed <?php echo $test_count ?> tests!</h1>
            <progress 
                max = "100" value = <?php echo ($test_count / 7) * 100 ?>>
            </progress>
            
            <div class = menuButtons>
                <a class = testButton href = "testForm.php">Start Test</a>
                <a class = resultsButton href = "testResults.php">Test Results</a>
                <a class = feedbackButton href = "feedback.php">Feedback</a>
            </div>
        <?php }
        ?>
    </section>
</div>