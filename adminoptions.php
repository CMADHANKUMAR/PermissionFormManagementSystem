<?php
 include('adminsession.php');
 ?>
  	<head>
		<title>Welcome</title>
	</head>
	<body> 
		<h3 style="color:red">Welcome <?php echo $username; ?>  <a href="logout.php">Logout</a></h1>
		<a href="classadvisorregistration.php">Class advisor registration</a>
		<a href="inchargeregistration.php">Incharge registration</a>
		<a href="adminregistration.php">Admin registration</a>
		<a href="adminstudentsearch.php">Search a student</a>
		<a href="adminstaffsearch.php">Search a staff</a>
		<a href="deletestudent.php">Delete a student</a>
		<a href="deletestaff.php">Delete a staff</a>
		<a href="updatestaff.php">Update staff</a>
		<a href="updatestudent.php">Update student informtion</a>
   
   
   
      <form action="view.php" method="post">
	    <?php
		  $adminview="select table_name from information_schema.tables where table_schema='onlineodcard'";
		  $adminviewquery=mysqli_query($db,$adminview); ?>
		  <select name="tabletoview">
		  <?php
		  while($adminviewresult=mysqli_fetch_array($adminviewquery,MYSQL_ASSOC))
		  {
		   ?>
		     <option value="<?php echo $adminviewresult['table_name'];?>"><?php echo $adminviewresult['table_name'];?></option>
			<?php
			
		  }
		   
		    ?>
			</select>
			<input type="submit" value="view" />
		  
	 </form>
</body>
	   
</html>