<?php
   include('studentclasssession.php');
   
?>
<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>
	  <a href="odrequest.php">Request Intracollege OD</a>
	  <a href="finalstep.php">Certificate uploads</a>
	  <a href="otherrequest.php">Request Intercollege od</a>
		<h3 style="color:red">Welcome <?php echo $username; ?>  <a href="logout.php">Logout</a></h1>

	 	</body>
	   
</html>