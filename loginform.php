<?php
//Starts session for specified user
SESSION_START();
$_SESSION['message']="";


error_reporting(E_ALL);

//checks to see if submit button is clicked

$submit = @$_POST['submit']; 
if(isset($_POST['submit'])) {
 include('db_conn.php');
 
 $username = mysqli_real_escape_string($db, $_POST['username']);
 $password = mysqli_real_escape_string($db, $_POST['password']);

 //error handelers
 //check if empty if not queries database for credentials
 // Compares user input password witht the hashed password saved in database
 if(empty($username) || empty($password)){
	echo "error username or password empty";
 }else{
	 $sql = "SELECT * FROM users WHERE username = '$username'";
	 $results = mysqli_query($db,$sql) or die("Error in query");
	 $resultcheck = mysqli_num_rows($results);
	 if($resultcheck < 1){
		$_SESSION['message'] = "User information incorrect";
	 }else{
		 if($row = mysqli_fetch_assoc($results)){
			$passver = password_verify($password, $row['password']);
			if($passver == false){
				$_SESSION['message'] = "Password is incorrect";
			}elseif($passver == true){
				 $_SESSION['username']="$username";
				 $_SESSION['userid'] = $row['user_id'];
				header('location: Welcome page.php'); //redirect to welcome page
			}
			 
		 }
	 }
 }
 
}

	
?>
<!DOCTYPE html>
<html>
<head>


</head>
<style>
  h1{
    text-align: center;
  }
  div.form{
    display: block;
    text-align: center;
  }
  .submit{
    margin-top: 1cm;
	width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 30px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer
  }
  .button{
	width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer
  }
  
  </style>
<title>Login Page</title>
<body>

<h1>Login</h1>
<!--form class-->  
 
  <div class="form">
	<form method="post">
  Username:<br>
  <input type="text" name="username" required><br>
  password:<br>
  <input type="password" name="password" required>
    
  <!-- button block-->
  <div style="text-align:center">  
    <input type="submit" class="submit" name="submit" value="Login"/>  
    <a href="registrationform.php" class="button">Create New Account</a>
	<div class="alert alert-error"> <?php echo $_SESSION['message']?></div>
		</div>
		</form>
	</div>  
    <p></p>
 </body>
</html>