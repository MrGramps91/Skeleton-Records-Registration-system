<?php $_SESSION['message']=""; ?>
<!DOCTYPE html>
<html>
<head>
<title>Front Page</title>
  <style>
    h1{
      text-align:center;
    }
    p{
      text-align:center;
    }
    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

    </style>
</head>
<body>
<div class="alert alert-error"> <?php echo $_SESSION['message']?></div>
<h1>Skeleton Records Referencing System</h1>
<p>To get started please login first.</p>
  <div style="text-align:center;">
<a href="loginform.php" class="button button1">Login</a> <!-- link to connect to the sign in/ sign up page-->
  </div>
</body>
</html>