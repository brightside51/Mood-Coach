<section>
    
    <?php
    // Get All Feedbacks Available in the Database
    $feedback = getFeedback();
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

            // Check array dimensions 
            for($i = 0; $i < $week; $i++)
            {?>
                <tr>
                    <?php 
                    if($test_count == 0 && ($test_date != $firsttestofweek))
                    {?>
                        <td><?php echo $i ?></td>
                        <td><?php echo "No Feedback" ?></td>
                        <td><?php echo "No Feedback" ?></td>
                        <td><?php echo "No Feedback" ?></td>
                    <?php 
                    } 
                    else
                    {?>
                        <td><?php echo $i ?></td>
                        <td><?php echo $feedback[$i][0] ?></td>
                        <td><?php echo $feedback[$i][1] ?></td>
                        <td><?php echo $feedback[$i][2] ?></td>
                    <?php 
                    }?>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

</section>