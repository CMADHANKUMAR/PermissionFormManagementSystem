<?php
  include('adminsession.php');
  ?>
  <html>
  <head></head>
  <body>
    <form action="" method="post">
	    <label>Student id:</label>
		<input type="text" name="id" />
		<input type="submit" value="submit" />
	</form>
	<?php 
	   if($_SERVER["REQUEST_METHOD"] == "POST")
		         {  
			           $id=$_POST['id'];
					   
					   if($id != "")
					   {
							$staffud="SELECT *FROM studentdetails WHERE rollno='$id'";
							$staffudqry=mysqli_query($db,$staffud);
							$staffudqryres=mysqli_fetch_array($staffudqry,MYSQLI_ASSOC);
							echo'<form action="updatestudin.php" method="post">';
							echo '<label>Staff ID:</label>';
							echo'<input type="text" name="sid" value="'.$staffudqryres['rollno'].'"/><br>';
							echo '<label>Staff Name:</label>';
							echo'<input type="text" name="sname" value="'.$staffudqryres['name'].'"/><br>';
							echo '<label>Staff Department:</label>';
							echo'<input type="text" name="sdept" value="'.$staffudqryres['department'].'"/><br>';
							echo '<label>Staff Year:</label>';
							echo'<input type="text" name="syear" value="'.$staffudqryres['year'].'"/><br>';
							echo '<label>Staff Class:</label>';
							echo'<input type="text" name="sclass" value="'.$staffudqryres['class'].'"/><br>';
							
							echo '<label>Staff mail id:</label>';
							echo'<input type="text" name="smail" value="'.$staffudqryres['mail'].'"/><br>';
							echo '<label>Staff Password:</label>';
							echo'<input type="text" name="spass" value="'.$staffudqryres['password'].'"  /><br>';
							
							echo'<input type="submit" value="update" />';
							
							






						 
					   }
				 }
				 ?>
				 </body>
				 </html>