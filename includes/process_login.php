<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    //$password = $_POST['p']; // The hashed password.
    $password = $_POST['p'];
 	$result = login($email, $password, $mysqli);
    if ($result == 'success') {
        // Login success 
        header('Location: ../protected_page.php');
    } else {
    	echo $result;
        // Login failed 
        header('Location: ../loginSec.php?error=' . $result);
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
?>