<?php
/*
$servername = "localhost";
$username = "root";
$password = "briggs-test";
$dbname = "myDB";*/

function connect($servername, $username, $password, $dbname)
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
/*function makeTable($name)
// sql to create table
$sql = "CREATE TABLE " . $name . " (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}*/
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Liam', 'Patty', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
