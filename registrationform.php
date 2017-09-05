<?php
SESSION_START();
  
  include ('db_conn.php'); //allows for database connection and query through a global variable
  
// Defined variables
  $_SESSION['message']='';  
  $firstname = @$_POST['firstname'];
  $lastname = @$_POST['lastname'];
  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $repass = @$_POST['repass'];
  $submit = @$_POST['submit'];
  $hashedPass = password_hash($password, PASSWORD_BCRYPT);   
  
  //Checks if information is placed in each field
  // hashes password and uploads information to database
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['password'] == $_POST['repass'] ){
		global $db;
		$firstname = $db -> real_escape_string($_POST['firstname']);
		$lastname = $db -> real_escape_string ($_POST['lastname']);
		$username = $db -> real_escape_string ($_POST['username']);
		$password = $db -> real_escape_string($_POST['password']);
		
		$sql = "INSERT INTO users (fullname, username, password)" 
		."VALUES('$firstname $lastname','$username','$hashedPass')";
		
		if($db -> query($sql) === true){
			$_SESSION['message'] = "Registration complete, user added";
		}
		else{
			$_SESSION['message'] = "User could not be added to the database";
		}
	
	}
	else{
		$_SESSION['message'] = "Passwords do not match";
	}
	
  }
  
	  
  
  ?>
<!DOCTYPE html>
<html>
  <head>

  
  
  
  </head>
  <style>
  input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    
    input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
    div.outset{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  border-style: outset;
  padding-bottom: 70px;
  margin-top: 30px;
  width: 450px;
  text-align: center;
}
  </style>

  <body>
   <h2>
     User Registration 
	  
    </h2>
	<p><a href="loginform.php" class="button">Return to Login page</a></p>
      <div class="outset">
         <div>
		<!-- text fields and label tags-->
		 <form method="post">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder"Enter your name" required><br>
         
         <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder"Enter your last name" required><br>
        
           <label for="username">Username</label>
        <input type="text" id="uname" name="username" placeholder"Create User Name" required><br>
         
            <label for="password">Password</label>
        <input type="password" id="pwrd"     name="password" required><br>
           
		   <label for="re-type_password">Re-Type Password</label>
        <input type="password" id="repass" name="repass" required><br>
		
         <input type="submit" name="submit" value="Submit">
		 
		 <!--error message display-->
		 
			<div class="alert alert-error"> <?= $_SESSION['message']?></div>
      </form>
    </div>
    
    </div>
   </body>

</html>  