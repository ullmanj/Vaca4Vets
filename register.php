<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        
        
        
        
        
        
        
        
        
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                method="post" 
                name="registration_form">
                
                <table class="pad">
      <tr>
        <td>First name:<br>
          <input type="text" name="firstname" id="firstname" placeholder="John"><br><br>
        </td>
        <td>Middle name (Optional):<br>
          <input type="text" name="middlename" id="middlename" placeholder="Rohan"><br><br>
        </td>
        <td>Last name:<br>
          <input type="text" name="lastname" id="lastname" placeholder="Adams"><br><br>
        </td>
        
      </tr>
      <tr>
        <td>Rank:<br>
          <input type="text" name="rank" id="rank" placeholder="Colonel"><br><br>
        </td>
        <td>Branch:<br>
          <input type="text" name="branch" id="branch" placeholder="Marines"><br><br>
        </td>
        <td>Active Dates:<br>
          <input type="text" name="aD" id="aD" placeholder="November 20, 2014 - PRESENT"><br><br>
        </td>
      </tr>
      <tr>
        <td>Email:<br>
          <input type="text" name="email" id="email" placeholder="john@adams.com"><br><br>
        </td>
        <td>Phone number:<br>
          <input type="text" name="phone" id="phone" placeholder="123-456-7890"><br><br>
        </td>
      </tr>
    <tr>
    <img class="signup" src="images/grayline.png" alt="gray line" width=300px>
      <td>Username<br>
      <input type="text" name="username" id="username" placeholder="johnAdams3"><br><br>
      </td>
    </tr>
    <tr>
      <td>
      Password (Must be at least 8 characters:<br>
      <input type="password" name="password" id="password"><br><br>
      </td>
    </tr>
    <tr>
      <td>
      Retype Password:<br>
      <input type="password" name="confirmpwd" id="confirmpwd"><br><br>
      </td>
    </tr>
    <tr>
      <td>
      <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                   		this.form.firstname,
                   		this.form.middlename,
                   		this.form.lastname,
                   		this.form.rank,
                   		this.form.branch,
                   		this.form.aD,
                        this.form.email,
                        this.form.phone,
                    	this.form.username,
                        this.form.password,
                        this.form.confirmpwd);" /> 
      </td>
    </tr>
      </table>
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>