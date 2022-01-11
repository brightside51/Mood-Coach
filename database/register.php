<!-- PHP: HTML to SQL Interface -->
<?php

    /* Input Obtainal */
    $cc_number = $_POST['cc_number'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $doctor = $_POST['doctor'];
    $health_number = $_POST['health_number'];
    $date_birth = $_POST['birthdate'];
    $address = $_POST['address'];

    /* SQLite Database Access */
    $dbh = new PDO('sqlite:../sql/moodCoach.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /* [Test] Input Printing */
    /* ?><h5><?php echo "Name: $name ; Email: $email ; Professional: $doctor ; Address: $address" ?></h5><?php */

    /* Data Input into SQL Database */
    function insertUser($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor)
    {   global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User(cc_number, password_, name_, phone_number, email, health_number, date_birth, address_, doctor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor));}
    
    try{insertUser($cc_number, $password, $name, $phone_number, $email, $health_number, $date_birth, $address, $doctor);
    } catch(PDOException $e) {echo $e;}

    /* Redirecting the User to the Menu */
    include('tos.php'); header('Location: tos.php'); exit;
?>