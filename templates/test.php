<!DOCTYPE html>
<html lang = "EN-US">
    <head>
        <meta charset = "UTF-8">
        <title>Test</title>
    </head>

    <body>
        <form action = "database\test.php" method = "post" id = "test">
            <ol>
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
            </ol>

            <input type = "submit" value = "Send">
        </form>
    </body>
</html>