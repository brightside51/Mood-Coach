<nav id = "testMenu">
    <section id = "feedbackProgress">
        <?php 
        if ($test_count == 7)
        { ?>
            <h1>Your Feedback is Being Generated...</h1>
        <?php }
        else if ($test_count < 7)
        { ?>
            <h1>Your Feedback is Being Generated...</h1>
        <?php }
        ?>
            <progress max = "100" value = <?php echo ($test_count / 7) * 100 ?>>
                <div class = "progress-bar">
                    <span style = "width: <?php echo ($test_count / 7) * 100 ?>%;">
                        Progress: <?php echo ($test_count / 7) * 100 ?>%</span>
                    </div>
            </progress> 
    </section>
    
    <ul>
        <li><a href = "testForm_tpl.php">Start Test</a></li>
        <li><a href = "weeklyResults_tpl.php">Weekly Results</a></li>
        <li><a href = "previousFeedback_tpl.php">Previous Feedback</a></li>
    </ul>
</nav>