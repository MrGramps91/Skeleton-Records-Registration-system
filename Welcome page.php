<?php
SESSION_START();

 ?>
<!DOCTYPE html>
<html>
 <head>
 
   <title>Welcome Page</title>
      <style>
        .button{
          background-color: #4CAF50; 
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
           font-size: 16px;
          cursor: pointer;
          margin: 130px;
          display: inline-block;
                   
        }
        .button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
        
       h1 {
         text-align: center;
       }
        h2{
          text-align: center;
        }
        
/* Content curtesy of w3schools.com */        
        .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    left: 150px;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
        ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 10px 16px;
    text-decoration: none;
    
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}
        
     </style>
    </head>
  <body>
    <ul>
	 <li><a href="#">Hello, <?php echo $_SESSION['username']; ?></a></li>
  <li><a href="#home">Home</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="logout.php">Logout</a></li>    
</ul>
  <h1> WELCOME TO THE SRRS PAGE.</h1>
    <h2>The purpose of this page is to provide a supplemental source for  tracking and referencing your records via 'Skeleton Records'. This site is not an official record repository, so please be aware of the content you upload to the site. The simplicity of this site relies on 'Collections', which could be considered a picture book. And in this 'Collection' or picture book are your 'Skeleton Records' or pictures. The records, like pictures are brief and provide a reference point for the actual contents in the records. It will provide an overiew for all records you account for.
            Have fun!!!!!</h2>
    <a href="RecordCreationform.php" class="button">Create/Update collection</a> <!-- Link to record creation page-->
    <div class="dropdown">
  <!--button class="dropbtn">Collections Created</button --> <!-- Link drop down section will display saved collections WORK IN PROGRESS-->
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
  </body>
 </html>
