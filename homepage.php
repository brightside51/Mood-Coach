<?php
// Fazer require_once dos ficheiros da pasta database
require_once('database/homepage.php');

// Fazer try catch com as funções necessárias provenientes dos ficheiros database
// Call functions and throw exception if necessary
try
{

}
catch(PDOException $e)
{
    echo $e;
}

// Fazer include dos ficheiros da pasta templates
include('templates/homepage.php');
?>