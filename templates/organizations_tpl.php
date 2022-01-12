<html>   
    <?php
    include('inMenuHeader_tpl.php');
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
    ?>

    <div>
        <h2 class = "page_title" > Support </h2>
    </div>
    
    <div>
        <fieldset  id = "supportLines">
            <legend>Support Organizations</legend>
            <ul class = "" >
                <?php foreach($organization as $org){ ?>
                    <li>
                    <h4><a class="supportLinks" href=<?php echo $org['website'] ?>><?php echo $org['name_']?></a></h4>
                    <p>Tel: <?php echo $org['contact_tel1']?> | <?php echo $org['contact_tel2'] ?> | <?php echo $org['contact_tel3'] ?></p>
                    <p>E-mail: <?php echo $org['contact_email']?></p>
                    </li>
                <?php } ?>
        </fieldset>
        
        <fieldset>
        <legend>Support Lines</legend>
            <ul class = "" >
                <?php foreach($supportLine as $spLine){ ?>
                    <li>
                        <h4><a class="supportLinks" href=<?php echo $spLine['website'] ?>><?php echo $spLine['name_']?></a></h4>
                        <p>Working hours: <?php echo $spLine['schedule']?></p>
                        <p>Contacts: <?php echo $spLine['contact_tel1']?> | <?php echo $spLine['contact_tel2'] ?> | <?php echo $spLine['contact_tel3'] ?></p> <!--  verificar as |  -->                                         
                    </li>
                <?php } ?>
        </fieldset>
    </div>      
</html> 


   

