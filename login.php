<html>
  <head>
    <title>Vacations for Veterans</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </head>
  
  <header>
    <h2>V4V</h2>
    <p><a class="navlink" href="login.html">LOG IN</a></p>
  </header>

  <body>
    <p class=small><a href="index.php">Sign up</a></p>
    <p class="left1">Welcome back! Please log in:</p>
    <form method="post" enctype="multipart/form-data"> <!-- TO WRAP ALL THIS: -->
      Email:<br>
      <input type="text" name="email" placeholder="john@adams.com"><br><br>
      Password:<br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Submit" name="signin">
    </form>
	
    <p class="padleft"><button type="button"><b>Continue ></b></button></p>
  </body>
</html>
<?php
include 'sql.php';

if(isset($_POST['signin']))
{
	if($_POST['email'] != "" && $_POST['password'] != "")
	{
		echo "THE ARRAY " . selectCol('\'steven@mcguilligan.net\''/*$_POST['email']*/, 'vets', ';', 'email', 'password');
		/*if(selectCol($_POST['email'], 'vets', ';', 'email')['password'] == $_POST['password'])
		{
			echo 'Proper credentials';
		}
		else
		{
			echo 'username and password dont match';
		}*/
	}
	else
	{
		echo 'Missing Info';
	}
}
else
{
	echo 'idk' . $_POST['signin'];
}


?>