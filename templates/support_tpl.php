<?php
    session_start();
    $_SESSION['page'] = 'org';
    include('homepageHeader_tpl.php');
    include('footer_tpl.php');
    require('../database/supportInfo.php');  
?>

<html>  
<body>
    <div>
        <h2 class = "page_title" > Support and Organizations </h2>
    </div>
    <div class = "container">
        <div>
            <div id="sptext">
                <h4 class="support">Support Lines</h4>
                <p class = "support"> When you are having sad or troubled thoughts and need to talk to someone, there are phone lines that can help you with that. You only need to pick up you phone and enter one of the numbers present in this list:
                    <a href="supportLines_tpl.php">here</a>.
                </p>    
            </div>   
            <div>
                <img class="supportImg" src="../images/sos-voz-amiga.png" alt="Support Lines" height= "360" width="320">   
            </div>
        </div>
        <div>
            <div id="sptext">
                <h4 class="support">Organizations</h4>
                <p class = "support"> There are many organizations and associassions that specialyze in dealing and helpin patients with different mental health problems. In this
                    <a href="organizations_tpl.php">page</a>, you can find some of those organizations. Know that you are not alone!
                </p>    
            </div>   
            <div>
                <img class="supportImg" src="../images/org.jpg" alt="Organizations" height= "360" width="320">        
            </div>
        </div>   
    </div>
</body>   
</html>