<?php
    include('homepageHeader_tpl.php');
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>
<html>
<body>
    <div>
        <h2 class = "page_title" > Support and Organizations > Organizations</h2>
    </div>
    <div class = "main">
        <ul class = "support" >
        <?php foreach($organization as $org){ ?>
        <li>
        <div class = "container">
            <div class = "item1">
                <h4><a class="supportLinks" href=<?php echo $org['website'] ?>><?php echo $org['name_']?></a></h4>
                <p>Tel: <?php echo $org['contact_tel']?> </p>
                <p>E-mail: <?php echo $org['contact_email']?></p>
            </div>
            <div class = "item2">
                <img class="orgImg" src="../images/<?php echo $org['name_']?>.jpg" alt="<?php echo $org['name_']?>">
            </div>
        </li>
        <?php } ?>    
        </div>    
    </div>
</body>     
</html>


   

