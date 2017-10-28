<?php
    include('adminsession.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$adminid=$_POST['adminid'];
			$adminname=$_POST['adminname'];
			$adminmail=$_POST['adminmail'];
			$adminpass=$_POST['adminpassword'];
			
			$adminquery="INSERT INTO staffdetails VALUES('$adminid','$adminname','','','','admin','$adminmail','$adminpass')";
			$adminqueryxec=mysqli_query($db,$adminquery);
			
			header("location: adminoptions.php");

			
			
			
			
		
			}
	
	
	
    ?>    
	<form action="" method="post">
	     <label>Admin id</label>
		 <input type="text" name="adminid" /><br>
	     <label>Admin name</label>
		 <input type="text" name="adminname" /><br>
	     <label>Admin mail id</label>
		 <input type="text" name="adminmail" /><br>
	     <label>Password</label>
		 <input type="password" name="adminpassword" /><br>
		 	     <label>Conform password</label>
		 <input type="password" name="adminconfrompassword" /><br>
		 <input type="submit" value="register" />
	</form>