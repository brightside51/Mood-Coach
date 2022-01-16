<section>
    
    <?php
    // Get All Feedbacks Available in the Database
    $feedback = getFeedback();

    if($test_count == 0)
    {?>
        <h1>In order to have get feedback, you have to submit tests!</h1>
        <a class = testButton href = "testForm.php">Start Test</a>
    <?php
    }
    else
    {?>
        <h1><?php echo "{$_SESSION['name']} | Feedback History"?></h1>
    <table>
        <tr>
            <th>Test No.</th>
            <th>Diagnosis</th>
            <th>Prescription</th>
            <th>Advice</th>
        </tr>

        <?php
        for($i = 0; $i < $test_count; $i++)
        {?>
            <tr>
                <td><?php echo ($i + 1)?></td>
                <td><?php echo $feedback[$i]['diagnosis']?></td>
                <td><?php echo $feedback[$i]['prescription']?></td>
                <td><?php echo $feedback[$i]['advice']?></td>
            </tr>
        <?php } 
        ?>
    </table>
    <?php }
    ?>
    
</section>