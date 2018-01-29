<html>
<body>
hi
<form method="post" enctype="multipart/form-data">
	<input type="submit" value="Connect" name="connect">
  	<input type="submit" value="ADD" name="ADD VET">
    <input type="submit" value="disconnect" name="Disconnect">
</form>
</body>
</html>
<?php
/*
$servername = "localhost";
$username = "root";
$password = "briggs-test";
$dbname = "V4V";*/
if (isset($_POST['connect'])) 
{ 
  openConnection("localhost", "root", "briggs-test", "V4V");
}  
if (isset($_POST['add'])) 
{ 
  addToVet(0, 1, "Steven", "Rohan", "McGuilligan", "The Marines", "The President", "Oct, 2014 - Active", "1-101-101-1101", "steven@mcguilligan.net", "NEVER", "PABLOWASKILLEDBYANAXEMURDERER");
}  
if (isset($_POST['dc'])) 
{ 
  closeConnection();
}  
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
function addToVet($id, $idN, $fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $password){
    $sql = "INSERT INTO vets ($id, idN, fName, mName, lName, branch, rank, activeDates, phoneNum, email, dolcu, password)
      VALUES ($id, $idN, $fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $password)";
	echo "HELLLO";
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
function getVetGroup($idN, $group)
{
    $sql = "SELECT " . $group . "FROM vets WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
function setVetGroup($idN, $group, $value)
{
    $sql = "UPDATE vets SET " . $group . "=\'" . $value . "\' WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
//Vendor functions (vendors)
function addToVendor($idN, $fName, $mName, $lName, $type, $phoneNum, $email, $active, $password){
    $sql = "INSERT INTO vendors (idN, fName, mName, lName, type, phoneNum, email, active, password)
    VALUES ($idN, $fName, $mName, $lName, $type, $phoneNum, $email, $active, $password)";

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
function getVendorGroup($idN, $group)
{
    $sql = "SELECT " . $group . "FROM vendors WHERE idN == " . $idN;
    $result = $conn->query($sql);
  
    return $result;
}
function setVendorGroup($idN, $group, $value)
{
    $sql = "UPDATE vendors SET " . $group . "=\'" . $value . "\' WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
//donor functions
function addToDonor($idN, $amount, $purpose){
    $sql = "INSERT INTO donor (idN, amount, purpose)
    VALUES ($idN, $amount, $purpose)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getAllDonorData()
{
  	$data = array();
    $sql = "SELECT * FROM donor";
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
function getDonorGroup($idN, $group)
{
    $sql = "SELECT " . $group . "FROM donor WHERE idN == " . $idN;
    $result = $conn->query($sql);
  
    return $result;
}
function setDonorGroup($idN, $group, $value)
{
    $sql = "UPDATE donor SET " . $group . "=\'" . $value . "\' WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
//experience functions
function addToExperience($idN, $sName, $address, $website, $description, $datesA, $fees){
    $sql = "INSERT INTO experience (idN, sName, address, website, description, datesA, fees)
    VALUES ($idN, $sName, $address, $website, $description, $datesA, $fees)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getAllExperienceData()
{
  	$data = array();
    $sql = "SELECT * FROM experience";
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
function getExperienceGroup($idN, $group)
{
    $sql = "SELECT " . $group . "FROM experience WHERE idN == " . $idN;
    $result = $conn->query($sql);
  
    return $result;
}
function setExperienceGroup($idN, $group, $value)
{
    $sql = "UPDATE experience SET " . $group . "=\'" . $value . "\' WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
//vachome functions
function addToVacHome($idN, $address, $REL, $description, $datesA, $bedrooms, $fees){
    $sql = "INSERT INTO vacHome (idN, address, REL, description, datesA, bedrooms, fees)
    VALUES ($idN, $address, $REL, $description, $datesA, $bedrooms, $fees)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getAllVacHomeData()
{
  	$data = array();
    $sql = "SELECT * FROM vacHome";
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
function getVacHomeGroup($idN, $group)
{
    $sql = "SELECT " . $group . "FROM vacHome WHERE idN == " . $idN;
    $result = $conn->query($sql);
  
    return $result;
}
function setVacHomeGroup($idN, $group, $value)
{
    $sql = "UPDATE vacHome SET " . $group . "=\'" . $value . "\' WHERE idN == " . $idN;
    $result = $conn->query($sql);
    return $result;
}
function closeConnection()
{
    $conn->close();
}
?>

