<html>
  <head>
    <title>Vacations for Veterans</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </head>
  
  <header>
    <h2>V4V</h2>
    <p><a class="navlink" href="login.php">LOG IN</a></p>
  </header>

  <body>
    <p class=small><a href="signupVend.php">Sign up as a Vendor</a></p>
    <p class="left1">Please sign up as a <i>Veteran:</i></p>
    <table class="pad">
    <form method="post" enctype="multipart/form-data"> <!-- TO WRAP ALL THIS: -->
      <tr>
        <td>First name:<br>
          <input type="text" name="firstname" placeholder="John"><br><br>
        </td>
        <td>Middle name (Optional):<br>
          <input type="text" name="middlename" placeholder="Rohan"><br><br>
        </td>
        <td>Last name:<br>
          <input type="text" name="lastname" placeholder="Adams"><br><br>
        </td>
        
      </tr>
      <tr>
        <td>Rank:<br>
          <input type="text" name="rank" placeholder="Colonel"><br><br>
        </td>
        <td>Branch:<br>
          <input type="text" name="branch" placeholder="Marines"><br><br>
        </td>
        <td>Active Dates:<br>
          <input type="text" name="aD" placeholder="November 20, 2014 - PRESENT"><br><br>
        </td>
      </tr>
      <tr>
        <td>Email:<br>
          <input type="text" name="email" placeholder="john@adams.com"><br><br>
        </td>
        <td>Phone number:<br>
          <input type="text" name="phone" placeholder="123-456-7890"><br><br>
        </td>
      </tr>
    </table>
    <img class="signup" src="images/grayline.png" alt="gray line" width=300px>
    Username<br>
      <input type="text" name="username" placeholder="johnAdams3"><br><br>
      Password (Must be at least 8 characters:<br>
      <input type="password" name="password"><br><br>
      Retype Password:<br>
      <input type="password" name="password2"><br><br>
      <input type="submit" value="Submit" name="createVet">
    </form>
    <!--p class="padleft"><a href="home.html"><button type="button"><b>Continue ></b></button></a></p-->
  </body>
</html>
<?php
include 'sql.php';
if (isset($_POST['createVet'])) 
{
	if($_POST['username'] != "" && $_POST['aD'] != "" && $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['rank'] != "" && $_POST['branch'] != "" && $_POST['email'] != "" &&  $_POST['phone'] != "" && $_POST['password'] != "" && $_POST['password2'] != "")
	{
		if(duplicateCol($_POST['username'], 'username', 'vets'))
		{
			if($_POST['password'] === $_POST['password2'])
			{
    			$array = array("idN" => 46, "first" => '\'' . $_POST['firstname'] . '\'', "middle" => '\'' . $_POST['middlename'] . '\'', "last" => '\'' . $_POST['lastname'] . '\'', "branch" => '\'' . $_POST['branch'] . '\'', 
				"rank" => '\'' . $_POST['rank'] . '\'', "activeD" => '\'' . $_POST['aD'] . '\'', "phoneNum" => '\'' . $_POST['phone'] . '\'', "email" => '\'' . $_POST['email'] . '\'', "dolcu" => '\'NEVER\'', 
				"username" => '\'' . $_POST['username'] . '\'', "password" => '\'' . $_POST['password'] . '\'');
    //adds vet to table: input1 is the column names in order (see above), input2 is the values: strings need to be encompased by single quotes
    //$input1 = "idN, first, middle, last, branch, rank, activeD, phoneNum, email, dolcu, username, password";
    //$input2 = "46, 'Steven', 'Rohan', 'Mcguilligan', 'Marines', 'Gunnery Sergeant', 'November 20, 2014 - PRESENT', '1-011-101-1000', 'steven@mcguilligan.net', 'NEVER', 'StevenMcguilligan1', 
				if(addToTable('vets', $array, 12))
  				{
   		 			echo 'Added';
  				}
 	 			else
  				{
  		 			echo 'Error Adding';
  				}
  			}
  			else
  			{
  				echo 'Passwords are not the same';
  			}
  		}
  		else
  		{
			echo 'Username is taken';
  		}
  	}
  	else
  	{
  		echo 'All boxes (Except middle name) must be filled';
  	}
}
?>

