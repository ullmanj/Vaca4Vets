<html>
<body>
TESTING
<form method="post" enctype="multipart/form-data">
        <input type="submit" value="Add" name="add">
        <input type="submit" value="Print" name="printc">
          <br>
          <input type="text" value = "col" name="delcc">
            <br>
            MUst put in with quotes if a string
            <input type="text" value = "val" name="delcv">
              <br>
        <input type="submit" value="Del" name="delc">
          
</form>
                  <span id="myspan"> OUTPUT </span>
</body>
</html>




<?php
/*
$servername = "localhost";
$username = "root";
$password = "briggs-test";
$dbname = "V4V";*/

if (isset($_POST['add'])) 
{
    
    //adds vet to table
    $input1 = "idN, first, middle, last, branch, rank, activeD, phoneNum, email, dolcu, username, password";
    $input2 = "46, 'Steven', 'Rohan', 'Mcguilligan', 'Marines', 'Gunnery Sergeant', 'November 20, 2014 - PRESENT', '1-011-101-1000', 'steven@mcguilligan.net', 'NEVER', 'StevenMcguilligan1', 'srohan524'";
  //if(addToTable('vets', 46, '\'Steven\'', '\'Rohan\'', '\'Mcguilligan\'', '\'Marines\'', '\'Gunnery Sergeant\'', '\'November 20, 2014 - PRESENT\'', '\'1-011-101-1000\'', '\'steven@mcguilligan.net\'', '\'NEVER\'', '\'StevenMcguilligan1\'', '\'srohan524\''))
if(addToTable('vets', $input1, $input2))
  {
    echo '<script type="text/javascript">',
     'document.getElementById("myspan").innerHTML ="Added";',
     '</script>';
  }
  else
  {
   echo '<script type="text/javascript">',
     'document.getElementById("myspan").innerHTML ="Error";',
     '</script>';
  }
}
    //sample for printing/returning all of the specified values of all vets for that column: example: return firstname of all vets
if(isset($_POST['printc']))
    {
//      $array = array("idN", "first", "middle", "last", "branch", "rank");
        //the string to put in to find values
        $inputString = "idN, first, middle, last, branch, rank";
      selectCol($inputString, "vets", ";");
    }
    //sample for deleting a row by value in a column: example: delete user in vets whose id is 17382
if(isset($_POST['delc']))
{
  //add quotes around val
  //table         col               value
  delRow("vets", $_POST['delcc'], $_POST['delcv']);
}
    function addToTable($table, $i1, $i2)
    {
        $mysqli = new mysqli("localhost", "root", "briggs-test", "V4V");
        
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        $sql = "INSERT INTO " . $table . " (" . $i1 . ") VALUES (" . $i2 . ")";
        if($mysqli->query($sql) === true){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
        
        // Close connection
        $mysqli->close();
    }
/*function addToTable($table, $idN, $fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $username, $password){
    $mysqli = new mysqli("localhost", "root", "briggs-test", "V4V");
 
// Check connection
    if($mysqli === false){
         die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
 
// Attempt insert query execution
    $sql = "INSERT INTO " . $table . " (idN, first, middle, last, branch, rank, activeD, phoneNum, email, dolcu, username, password) VALUES (" . $idN . ", " . $fName . ", " . $mName . ", " . $lName . ", " . $branch . ", " . $rank . ", " . $activeDates . ", " . $phoneNum . ", " . $email . ", " . $dolcu . ", " . $username . ", " . $password . ")";
    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
 
    // Close connection
    $mysqli->close();
}*/
  //* for all, commas for multiple
  //order is optional: semicolon for nothing,  ORDER BY row
  //arr is for all of the cols
function selectCol($cols, $table, $order)
{
    $arr = array();
    $arr = explode(', ', $cols);
    $num = count($arr);
  $conn = new mysqli("localhost", "root", "briggs-test", "V4V");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $sql = "SELECT " . $cols . " FROM " . $table . $order;
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        for($y = 0; $y < $num; $y++)
        {
            echo "<b>" . $arr[$y] . "</b>: " . $row[$arr[$y]] . "<br>";
        }
        echo "<br>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();
}
function delRow($table, $col, $val)
  {
    $conn = new mysqli("localhost", "root", "briggs-test", "V4V");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  // sql to delete a record
  $sql = "DELETE FROM " . $table . " WHERE " . $col . "=" . $val;
  
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();
  }
                
?>
  
