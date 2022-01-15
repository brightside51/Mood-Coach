<?php session_start(); ?>

<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Mood Coach | Homepage Header Template</title>

        <!-- CSS Styling -->
        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/main_style.css">
        <link rel = "stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    </head>

    <body>
        <section id = "feedbackProgress">
            <h1>Your Feedback is Being Generated...</h1>
                <progress max = "100" value = <?php ($test_count / 7) * 100 ?>>
                    <div class = "progress-bar">
                        <span style = "width: <?php ($test_count / 7) * 100 ?>%;">
                        Progress: <?php ($test_count / 7) * 100 ?>%</span>
                    </div>
                </progress> 
            </section>

            <nav id = "testMenu">
                <ul>
                    <li><a href = "test.php">Start Test</a></li>
                    <li><a href = "week_results_tpl.php">Weekly Results</a></li>
                    <li><a href = "prev_feedback_tpl.php">Previous Feedback</a></li>
                </ul>
            </nav>
        </section>
    </body>
</html>
