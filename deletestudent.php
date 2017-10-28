<html>
		<head>
			<title>Delete student</title>
		</head>
		<body>
		<h1>Delete a student</h1>
<?php 
   include('adminsession.php');
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$stdid=$_POST['studentid'];
			$stddelete="DELETE from studentdetails WHERE rollno='$stdid'";
			$stddeletexec=mysqli_query($db,$stddelete);
			header("location: adminoptions.php");
		}
		?>
			<form action="" method="post" >
				<label>Enter student id</label>
				<input type="text" name="studentid" />
				<input type="submit" value="Delete" />
			</form>
		</body>
		</html>