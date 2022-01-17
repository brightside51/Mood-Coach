<?php session_start(); 
$_SESSION['page'] = 'patientList';
$cc_number = $_SESSION['cc_number']; ?>

<!-- Patient List Page -->
<!-- http://localhost:8080/moodcoach/database/patientList.php -->

<!DOCTYPE html>
<html lang = "en" dir = "ltr">

    <!-- Page Information and Style -->
    <head>
        <meta charset = "utf-8">
        <title>Mood Coach | Patient List</title>
        <meta name = "viewport"
        content = "width=device-width, initial-scale=1">

        <link rel = "stylesheet" type = "text/css" href = "../css/styleSheet.css">
    </head>

    <!---------------------------------------------------->

    <!-- Page Body -->
    <body>
        
        <!-- Homepage Header Template -->
        <?php include('../templates/homepageHeader_tpl.php');
        require('userList.php'); $patientList = getPatientList($cc_number); ?>
        
        <!-- Main Section -->
        <table>
            <tr>
                <th>Patient Name</th>
                <th>CC Number</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Birth</th>
                <th>Health Number</th>
                <th>Tests Realized</th>
            </tr>

            <?php foreach($patientList as $p)
            { $extraP = getExtraPatientList($p['cc_number']); ?>
                <tr>
                    <td> <?php echo $extraP['name_']; ?> </td>
                    <td> <?php echo $extraP['cc_number']; ?> </td>
                    <td> <?php echo $extraP['email']; ?> </td>
                    <td> <?php echo $extraP['phone_number']; ?> </td>
                    <td> <?php echo $p['address_']; ?> </td>
                    <td> <?php echo $p['date_birth']; ?> </td>
                    <td> <?php echo $p['health_number']; ?> </td>
                    <td> <?php echo $p['test_count']; ?> </td>
                </tr>
            <?php } ?>

        </table>

        <!-- Footnotes/Footer -->
        <?php 
        include('../templates/footer_tpl.php')?>