<section>
    <h1><?php echo "{$_SESSION['name']} | Test Results"?></h1>

    <?php
    for($i = 1; $i <= $test_count; $i++)
    { ?>
        <h3><?php echo "Test " . $i ?></h3>

        <ol>
            <?php
            $questions = getQuestions($test_count);
            foreach($questions as $key => $value)
            { ?>
                <li>
                    <h4><?php echo $value['content'] ?></h4>
                    <p><?php echo $given_answers[$key][0]['given_answer'] ?></p>
                </li>
            <?php 
            }
        ?>
        </ol>
    <?php 
    } ?>
</section>