<html>
		<head>
			<title>Delete staff</title>
		</head>
		<body>
		<h1>Delete a staff</h1>
<?php 
   include('adminsession.php');
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$staffid=$_POST['staffid'];
			$staffdelete="DELETE from staffdetails WHERE id='$staffid'";
			$staffdeletexec=mysqli_query($db,$staffdelete);
			header("location: adminoptions.php");
		}
		?>
			<form action="" method="post" >
				<label>Enter staff id</label>
				<input type="text" name="staffid" />
				<input type="submit" value="Delete" />
			</form>
		</body>
		</html>