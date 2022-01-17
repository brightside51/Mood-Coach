<?php
    include('homepageHeader_tpl.php');
    $_SESSION['page'] = 'org';
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>
<html>
<body>
    <div>
        <h2 class = "page_title" > Support and Organizations > Organizations</h2>
    </div>
    <div class = "container">
        <ul>
        <?php foreach($organization as $org){ ?>
        <div class = "item1">
            <li>
            <div class = "">
                <h4><a class="supportLinks" href=<?php echo $org['website'] ?>><?php echo $org['name_']?></a></h4>
                <p>Tel: <?php echo $org['contact_tel']?> </p>
                <p>E-mail: <?php echo $org['contact_email']?></p>
            </div>
            <div>
                <img class="<?php echo $org['name_']?>" src="../images/<?php echo $org['name_']?>.jpg" alt="<?php echo $org['name_']?>">
            </div>    
            </li>   
        <?php }?>    
        </div>    
    </ul>   
    </div>
</body>     
</html>


   

