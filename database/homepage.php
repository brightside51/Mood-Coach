<?php session_start(); 
$_SESSION['page'] = 'home'; ?>

<!-- Home Page -->
<!-- http://localhost:8080/moodcoach/database/homepage.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Homepage</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">

        <link rel = "stylesheet" type = "text/css" href = "../css/general_style.css">
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>
        
        <!-- Homepage Header Template -->
        <?php include('../templates/homepageHeader_tpl.php') ?>
        
        <!-- About Us Section -->
        <div class = "main">
            <h1>About Us</h1>
            <p>O projeto em questão foi desenvolvido no âmbito da Unidade Curricular de <b>ESIN</b> (<i>Engenharia de Sistemas de Informação</i>) durante o 1º semestre do ano letivo 2021/2022 pelos alunos <b>Ana Marta Dias</b> (<i>up201806879</i>), <b>Joana Martins</b>(<i>up201806234</i>) e <b>Pedro Sousa</b> (<i>up201806246</i>).</p>
            <p>Este website tem como principal intuito desenvolver um sistema de informação que permita, em simultâneo, armazenar dados relativos a pacientes de doenças mentais, diagnosticar, e melhorar a sua condição, através do acompanhamento do médico respetivo, que terá acesso aos dados registados ao longo do tempo.</p>
            <img class =" logoImg" src = "../images/cover_logo.jpg" alt = "Support Lines" height = "360" width = "640">
        </div>

        <!-- Footnotes/Footer -->
        <?php 
        include('../templates/footer_tpl.php')?>