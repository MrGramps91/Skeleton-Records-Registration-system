<!DOCTYPE html>
<html>
<head>
<?php
SESSION_START();

$name="";
$date="";
$comment="";
$id=0;
$edit_state = false;

include ('db_conn.php');	
$_SESSION['message']='';

if(isset($_POST['save'])){
	
	global $db;
	$name = @$_POST['name'];
	$date = @$_POST['date'];
	$comment = @$_POST['comment'];
	$user = $_SESSION['userid'];
	$query = "INSERT INTO recordinfo(user, recordname, datecreated, description) VALUES('$user','$name','$date','$comment')";
	$result = mysqli_query($db, $query) ;
	if (false ===$result){
		printf("error: %s\n" , mysqli_error($db));
	}else{
		$_SESSION['message']='Record has been saved';
	}
}

//updates records
if(isset($_POST['update'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$comment = $_POST['comment'];
	$id = $_POST['id'];
	
	mysqli_query($db, "UPDATE recordinfo SET recordname = '$name', datecreated = '$date', description = '$comment' WHERE record_id = $id ");
	$_SESSION['message']='Record has been updated';
}

//delete records

if(isset($_GET['delete'])){
	$id = $_GET['delete']; 
	 mysqli_query($db, "DELETE FROM recordinfo WHERE record_id=$id");
	 $_SESSION['message']='Record has been deleted';
}


$results = mysqli_query($db, "SELECT * FROM recordinfo WHERE user='" . $_SESSION['userid'] . "'");

//displayes record information
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM recordinfo WHERE record_id=$id");
	$res = mysqli_fetch_array($rec);
		$name = $res['recordname'];
		$date = $res['datecreated'];
		$comment = $res['description'];
		$id = $res['record_id'];
		
	
}

?>
  <title>Skeleton Reference Page</title>
 <style>
  body{
  font-size: 19px;
}

table{
  width: 50%;
  margin: 30px auto;
  border-collapse: collapse;
  text-align: left;
  
}

tr{
  border-bottom: 1px solid #cbcbcb;
}

th, td{
  border:none;
  height: 30px;
  padding: 2px;
}

tr:hover{
  background: #f5f5f5;
}

form{
  width: 45%;
  margin: 50px auto;
  text-align: left;
  padding: 20px;
  border: 1px solid #bbbbbb;
  border-radius: 5px;
}

.input-group{
  margin: 10px 0px 10px 0px;
 }
.input-group label{
  display: block;
  text-align: left;
  margin: 3px;
}

.input-group input{
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}

.button{
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5f9ea0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
  </style>

   <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Record Name</th>
        <th>Date Created</th>
        <th colspan="2">Description</th>
      </tr>
    </thead>
    <tbody>
	<?php while ($row = mysqli_fetch_array($results)){?>
		<tr>
        <td><?php echo $row['recordname'];?></td>
        <td> <?php echo $row['datecreated'];?></td>
		<td> <?php echo $row['description'];?></td>
        <td>
          <a href="RecordCreationform.php?edit=<?php echo $row['record_id']; ?>">Edit</a>
        </td>
        <td>
          <a href="RecordCreationform.php?delete=<?php echo $row['record_id']; ?>">Delete</a>
        </td>
      </tr>
	<?php } ?>
	<!-- Static variables used to show brief demostration of how the program will function-->
      
    </tbody>
  </table>
 <!-- Tags used for record creation i.e. labels, and clickable buttons--> 
  <form method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label> Record name</label>
      <input type="text" name="name" value="<?php echo $name; ?>" required>
    </div>
      <div class="input-group">
      <label> Date created</label>
      <input type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $date; ?>" required>
    </div>
    <label for="usrform">Description of the record</label><br>
     <textarea rows="10" cols="60"name="comment" form="usrform" value="<?php echo $comment; ?>">
          </textarea>
     <div class="input-group">
	 <?php if($edit_state==false): ?>
		<button type="submit" name="save" class="button">Save</button>
	 <?php else: ?>
		<button type="submit" name="update" class="button">Update</button>
	 <?php endif ?>
      
	   <a href="Welcome page.php" class="button">Previous Page</a>
	   <div class="alert alert-error"> <?php echo $_SESSION['message']?></div>
    </div>
  </form>
   </body>
</html>