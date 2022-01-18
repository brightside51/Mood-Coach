<?php
    include('homepageHeader_tpl.php');
    $_SESSION['page'] = 'org';
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>
<html>

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Support Lines</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">
    </head>

    <body>
       <div>
        <h2 class = "page_title" > Support and Organizations> Support Lines</h2>
    </div>
    <div class = "container-org">
        <ul>
            <?php foreach($supportLine as $spLine){ ?>
                <div class = "item1">
                <li>
                    <h4><a class="supportLinks" href=<?php echo $spLine['website'] ?>><?php echo $spLine['name_']?></a></h4>
                    <p>Working hours: <?php echo $spLine['schedule']?></p>
                    <p>Contacts: <?php echo $spLine['contact_tel']?> </p>                                     
                </li>
                <?php } ?>  
            </div>
        </ul>  
    </div> 
    </body>   
</html>