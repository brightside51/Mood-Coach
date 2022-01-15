<html>   
    <?php
    include('inMenuHeader_tpl.php');
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
    ?>

    <div>
        <h2 class = "page_title" > Support > Organizations</h2>
    </div>
    <div class = "main">
        <ul class = "support" >
        <?php foreach($organization as $org){ ?>
        <li>
        <div class = "container">
            <div>
                <h4><a class="supportLinks" href=<?php echo $org['website'] ?>><?php echo $org['name_']?></a></h4>
                <p>Tel: <?php echo $org['contact_tel']?> </p>
                <p>E-mail: <?php echo $org['contact_email']?></p>
            </div>
            <div>
                <img class="orgImg" src="../images/<?php echo $org['name_']?>.jpg" alt="<?php echo $org['name_']?>">
            </div>
        </li>
        <?php } ?>    
        </div>    
    </div>      
</html> 


   

