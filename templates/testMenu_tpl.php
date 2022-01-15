<div id = "testMenu">
    <section id = "feedbackProgress">
        <?php 
        if ($test_count == 7)
        { ?>
            <h1>Feedback is ready!</h1>
            <progress 
                max = "100" value = <?php echo ($test_count / 7) * 100 ?>>
            </progress>
            <ul>
                <a class = feedbackButton href = "previousFeedback.php">Previous Feedback</a>
            </ul>
        <?php }

        else if ($test_count < 7)
        { ?>
            <h1>Your Feedback is Being Generated...</h1>
            <progress 
                max = "100" value = <?php echo ($test_count / 7) * 100 ?>>
            </progress>
            <ul>
                <a class = weekButton href = "weeklyResults.php">Weekly Results</a>
                <a class = testButton href = "testForm.php">Start Test</a>
                <a class = feedbackButton href = "previousFeedback.php">Previous Feedback</a>
            </ul>
        <?php }
        ?>
    </section>
</div>