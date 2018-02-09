<html>
<body>
TESTING
<form method="post" enctype="multipart/form-data">
        <input type="submit" value="Add" name="add">
          <input type="submit" value="Print" name="printc">
</form>
                  <span id="myspan"> OUTPUT </span>
</body>
</html>




<?php
echo "WORK";
/*
$servername = "localhost";
$username = "root";
$password = "briggs-test";
$dbname = "V4V";*/

if (isset($_POST['add'])) 
{ 
  if(addToTable('vets', 46, '\'Steven\'', '\'Rohan\'', '\'Mcguilligan\'', '\'Marines\'', '\'Gunnery Sergeant\'', '\'November 20, 2014 - PRESENT\'', '\'1-011-101-1000\'', '\'steven@mcguilligan.net\'', '\'NEVER\'', '\'StevenMcguilligan1\'', '\'srohan524\'')
  {
    echo '<script type="text/javascript">',
     'document.getElementById("myspan").innerHTML ="Added";',
     '</script>';
  }
  else
  {
   echo '<script type="text/javascript">',
     'document.getElementById("myspan").innerHTML ="ERRROORRRRR";',
     '</script>';
  }
}
if(isset($_POST['printc']))
    {
      $array = array("idN", "first", "middle", "last", "branch", "rank");
      selectCol("idN, first, middle, last, branch, rank", "vets", ";", $array, 6);
    }
function addToTable($table, $idN, $fName, $mName, $lName, $branch, $rank, $activeDates, $phoneNum, $email, $dolcu, $username, $password){
    $mysqli = new mysqli("localhost", "root", "briggs-test", "V4V");
 
// Check connection
    if($mysqli === false){
         die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
 
// Attempt insert query execution
    //$sql = "INSERT INTO persons (first_name, last_name, email) VALUES (" . $fName . ", " . $mName . ", " . $lName . ")";
   echo $sql . "\n";
// $sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('Peter', 'Parker', 'no')";
    //$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('gs', 'gr', 'gm')";
    $sql = "INSERT INTO " . $table . " (idN, first, middle, last, branch, rank, activeD, phoneNum, email, dolcu, username, password) VALUES (" . $idN . ", " . $fName . ", " . $mName . ", " . $lName . ", " . $branc$
    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
 
    // Close connection
    $mysqli->close();
}
  //* for all, commas for multiple
  //order is optional: semicolon for nothing,  ORDER BY row
  //arr is for all of the cols
function selectCol($cols, $table, $order, $arr, $num)
{
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