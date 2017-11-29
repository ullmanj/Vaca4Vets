<?php
/*
$servername = "localhost";
$username = "root";
$password = "briggs-test";
$dbname = "V4V";*/

function openConnection($servername, $username, $password, $dbname)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }
    return true; 
}
function addToVet($fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $password){
    $sql = "INSERT INTO vet (fName, mName, lName, branch, rank, activeDates, phoneNum, email, dolcu, password)
    VALUES ($fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $password)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getAllVetData()
{
    $sql = "SELECT * FROM vets";
    $result = $conn->query($sql);
    return $result;
}
function getVetGroup($group)
{
    $sql = "SELECT " . $group . "FROM vets";
    $result = $conn->query($sql);
    return $result;
}
function closeConnection()
{
    $conn->close();
}
?>
