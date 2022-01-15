<?php
    include('homepageHeader_tpl.php');
    $_SESSION['page'] = 'org';
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>
<html>
    <body>
       <div>
        <h2 class = "page_title" > Support > Support Lines</h2>
    </div>
    <div>
        <ul class = "support">
        <?php foreach($supportLine as $spLine){ ?>
            <li>
                <h4><a class="supportLinks" href=<?php echo $spLine['website'] ?>><?php echo $spLine['name_']?></a></h4>
                <p>Working hours: <?php echo $spLine['schedule']?></p>
                <p>Contacts: <?php echo $spLine['contact_tel']?> </p>                                     
            </li>
        <?php } ?>
        </ul>  
    </div> 
    </body>   
</html>  
    
   