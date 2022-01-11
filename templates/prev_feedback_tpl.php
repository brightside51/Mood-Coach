<section>
    <?php

    // GET VARIABLES FROM SESSION ($username)

    // Get Test ID
    $test_id = getTestID($username, $test_count);

    // Get Feedback
    //if()
    //{
        $feedback = getFeedback($test_id);
    //}

    ?>

    <h1><?php echo $username . " | Feedback History"?></h1>
    <table>
        <thead>
            <tr>
                <th>Week No.</th>
                <th>Diagnosis</th>
                <th>Prescription</th>
                <th>Advice</th>
            </tr>
        </thead>

        <tbody>
            <?php
            for($i = 0; $i < count($feedback); $i++)
            {?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $feedback[$i][0] ?></td>
                    <td><?php echo $feedback[$i][1] ?></td>
                    <td><?php echo $feedback[$i][2] ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

</section>