<section class = results>
    <h1><?php echo "{$_SESSION['name']} | Test Results"?></h1>

    <?php
    for($i = 1; $i <= $test_count; $i++)
    { ?>
        <section class = testResults>
            <h3><?php echo "TEST " . $i ?></h3>

            <ol>
                <?php
                $questions = getQuestions($i);
                foreach($questions as $key => $value)
                { ?>
                    <li>
                        <h4><?php echo $value['content'] ?></h4>
                        <p><?php echo $given_answers[$key][0]['given_answer'] ?></p>
                    </li>
                <?php 
                } ?>
            </ol>
        </section>
    <?php 
    } ?>
</section>