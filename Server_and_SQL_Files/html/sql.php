<html>
<body>
hi
</body>
</html>
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
//vet functions (vets)
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
    $data = array();
    $sql = "SELECT * FROM vets";
    $result = $conn->query($sql);
  	if ($result->num_rows > 0) {
        // output data of each row
      	while($row = $result->fetch_array()){//loop to get all results
            $data[] = $row;//grab everything and store inside array
     	}
    } else {
        echo "0 results";
    }
    //access like a 2d array
    return $data;
}
function getVetGroup($id, $group)
{
    $sql = "SELECT " . $group . "FROM vets WHERE id == " . $id;
    $result = $conn->query($sql);
    return $result;
}
//Vendor functions (vendors)
function addToVendor($fName, $mName, $lName, $type, $phoneNum, $email, $active, $password){
    $sql = "INSERT INTO vendors (fName, mName, lName, type, phoneNum, email, active, password)
    VALUES ($fName, $mName, $lName, $type, $phoneNum, $email, $active, $password)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getAllVendorData()
{
  	$data = array();
    $sql = "SELECT * FROM vendors";
    $result = $conn->query($sql);
  	if ($result->num_rows > 0) {
        // output data of each row
      	while($row = $result->fetch_array()){//loop to get all results
            $data[] = $row;//grab everything and store inside array
     	}
    } else {
        echo "0 results";
    }
    //access like a 2d array
    return $data;
}
function getVendorGroup($id, $group)
{
    $sql = "SELECT " . $group . "FROM vendors WHERE id == " . $i;
    $result = $conn->query($sql);
  
    return $result;
}

function closeConnection()
{
    $conn->close();
}
?>

