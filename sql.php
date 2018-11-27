

<html>
<body>
<!--
 Tables so you know what the params are:
 CREATE TABLE donor (idN INTEGER, amount DOUBLE, purpose VARCHAR (1000));

CREATE TABLE experience (idN INTEGER, sName VARCHAR (60), address VARCHAR (100), website VARCHAR (100), description VARCHAR (1000), datesA VARCHAR (100), fees VARCHAR (100));

CREATE TABLE vacHome (idN INTEGER, address VARCHAR (100), REL VARCHAR (100), description VARCHAR (1000), datesA VARCHAR (100), bedrooms INTEGER, fees VARCHAR (100));

CREATE TABLE vendor (idN INTEGER, first VARCHAR (30), middle VARCHAR (30), last VARCHAR (40), typeId VARCHAR (20), phoneNum VARCHAR (30), email VARCHAR (40), 
active BOOLEAN, username VARCHAR (25), password VARCHAR (25));

CREATE TABLE vets (idN INTEGER, first VARCHAR (30), middle VARCHAR (30), last VARCHAR (40), branch VARCHAR (30), rank VARCHAR (30), activeD VARCHAR (60), phoneNum VARCHAR (30), email VARCHAR (40), dolcu VARCHAR (20), username VARCHAR (25), password VARCHAR (25));
CREATE TABLE `secure_login` . `vets` (
	`idN` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`first` VARCHAR (30) NOT NULL, 
	`middle` VARCHAR (30) NOT NULL, 
	`last` VARCHAR (40) NOT NULL, 
	`branch` VARCHAR (30) NOT NULL, 
	`rank` VARCHAR (30) NOT NULL, 
	`activeD` VARCHAR (60) NOT NULL, 
	`phoneNum` VARCHAR (30) NOT NULL, 
	`email` VARCHAR (40) NOT NULL, 
	`dolcu` VARCHAR (20) NOT NULL, 
	`username` VARCHAR (25) NOT NULL, 
	`password` VARCHAR (128) NOT NULL,
	`salt` char(128) NOT NULL
) ENGINE = InnoDB;
INSERT INTO `secure_login`.`vets` VALUES(
	1, 
	'Test', 
	'M', 
	'User', 
	'Marines', 
	'General', 
	'Nov 2014-PRESENT', 
	'1-234-567-8900', 
	'test@example.com', 
	'NEVER', 
	'test_user', 
	'00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

 Additional Notes around the functions. Let me know if you have questions-->

TESTING
<form method="post" enctype="multipart/form-data">
        <input type="submit" value="Add" name="add">
        <input type="submit" value="Print" name="printc">
        Id num for value
        <input type="text" placeholder = "id num" name="pCV">
          <br>
          <!--<input type="text" value = "col" name="delcc">-->
            <br>
            MUst put in with quotes if a string
            <input type="text" placeholder = "val" name="delcv">
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
    $array = array("idN" => 46, "first" => '\'Steven\'', "middle" => '\'Rohan\'', "last" => '\'Mcguilligan\'', "branch" => '\'Marines\'', 
"rank" => '\'Gunnery Sergeant\'', "activeD" => '\'November 20, 2014 - PRESENT\'', "phoneNum" => '\'1-011-101-1000\'', "email" => '\'steven@mcguilligan.net\'', "dolcu" => '\'NEVER\'', 
"username" => '\'StevenMcguilligan1\'', "password" => '\'srohan524\'');
    //adds vet to table: input1 is the column names in order (see above), input2 is the values: strings need to be encompased by single quotes
    //$input1 = "idN, first, middle, last, branch, rank, activeD, phoneNum, email, dolcu, username, password";
    //$input2 = "46, 'Steven', 'Rohan', 'Mcguilligan', 'Marines', 'Gunnery Sergeant', 'November 20, 2014 - PRESENT', '1-011-101-1000', 'steven@mcguilligan.net', 'NEVER', 'StevenMcguilligan1', 
if(addToTable('vets', $array, 12))
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
    //sample for printing all of the specified values of all vets for that column: example: return firstname of all vets, let me know if you want different return types, but it should be pretty
// simple to modify just copy the original
if(isset($_POST['printc']))
    {
        //the string to put in to find values
        //$inputA = "idN, first, middle, last, branch, rank";
      //$inputA = array("idN", "first", "middle", "last", "branch", "rank");
      selectCol($_POST['pCV'], "vets", ";", "idN", "first");
    }
    //sample for deleting a row by value in a column: example: delete user in vets whose id is 17382
if(isset($_POST['delc']))
{
  //add quotes around val
  //table         col               value
  delRow("vets", $_POST['delcv']);
}
    function addToTable($table, $i1, $i2)
    {
      $in2 = "";
      $in1 = "";
      for($x = 0; $x < $i2 - 1; $x++)
      {
            $in1 = $in1 . key($i1) . ", ";
            $in2 = $in2 . $i1[key($i1)] . ", ";
            next($i1);
        }
        $in1 = $in1 . key($i1);
        $in2 = $in2 . $i1[key($i1)];
echo "Thing1: " . $in1;
echo "<br>Thing2:" . $in2 . "<br>";
		$conn = new mysqli("localhost", "root", "briggs-test", "V4V");
        
        
        
        
        
        
        // Check connection
        if ($conn->connect_error) {
      		die("Connection failed: " . $conn->connect_error);
  		} 
  		
        $sql = "INSERT INTO " . $table . " (" . $in1 . ") VALUES (" . $in2 . ")";
        if($conn->query($sql) === true){
            echo "Records inserted successfully.";
            return true;
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
        
        // Close connection
        $conn->close();
        return false;
    }
  //* for all, commas for multiple
  //order is optional: semicolon for nothing,  ORDER BY row
  //arr is for all of the cols
function selectCol($colV, $table, $order, $col, $key)
{
    //$arr = array();
    //$arr = explode(', ', $cols)
  $conn = new mysqli("localhost", "root", "briggs-test", "V4V"); //root, briggs-test
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  
  $stmt = $conn->prepare('SELECT *  FROM ? WHERE ? = ? ?');
	$stmt->bind_param('ssss', $table, $col, $colV, $order); // 's' specifies the variable type => 'string'

	$stmt->execute();
	
	$result = $stmt->get_result();
  
  /*$sql = "SELECT *  FROM " . $table . " WHERE " . $col . " = " . $colV . $order;
//  echo $sql;
  $result = $conn->query($sql);*/
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       // var_dump($array);
       // var_dump($row);
        return $row[$key];
      }
  } else {
      echo "0 results";
  }
  $conn->close();
}
function duplicateCol($val, $cols, $table)
{
    //$arr = array();
    //$arr = explode(', ', $cols)
    
    
    
    
    
  $conn = new mysqli("localhost", "root", "briggs-test", "V4V");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  
  
	$stmt = $conn->prepare('SELECT * FROM vets WHERE ? = ?;');
	if(!$stmt)
	{
		die("Connection failed ahhhhhhhh: " . $stmt->connect_error);
	}
	$stmt->bind_param('ss', $cols, $val); // 's' specifies the variable type => 'string'

	$stmt->execute();
	
	$result = $stmt->get_result();
  
  
  
  /*$sql = "SELECT *  FROM " . $table . " WHERE " . $cols . " = " . $val . ";";
//  echo $sql;
  $result = $conn->query($sql);*/
  $i = false;
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      	$i = true;
      }
  } else {
      echo "0 results";
  }
  return $i;
  $conn->close();
}
function delRow($table, $val)
  {
    $conn = new mysqli("localhost", "root", "briggs-test", "V4V");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  // sql to delete a record
  $sql = "DELETE FROM " . $table . " WHERE idN = " . $val . ";";
  
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();
  }
                
?>
  

