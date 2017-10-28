<html>
		<head>
			<title>Search student</title>
		</head>
		<body>
<?php 
   include('adminsession.php');
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$staffid=$_POST['staffid'];
			$staffsearch="SELECT *FROM staffdetails WHERE id='$staffid'";
			$staffsearchxec=mysqli_query($db,$staffsearch);
			$staffsearchresult=mysqli_fetch_array($staffsearchxec,MYSQLI_ASSOC);
			echo'<hr><h1>Staff details</h2><hr>';
			echo'<h2>Staff id:'.$staffsearchresult['id'].'</h2>';
			echo'<h2>Staff name:'.$staffsearchresult['name'].'</h2>';
			echo'<h2>Staff department:'.$staffsearchresult['department'].'</h2>';
			echo'<h2>Year :'.$staffsearchresult['year'].'</h2>';
			echo'<h2>Class :'.$staffsearchresult['class'].'</h2>';
			echo'<h2>Staff position:'.$staffsearchresult['position'].'</h2>';
			echo'<h2>Mail id:'.$staffsearchresult['mail'].'</h2>';
			echo'<h2>Password :'.$staffsearchresult['password'].'</h2><hr>';
			
			
		}
		?>
		<form action="" method="post" >
				<label>Enter staff id</label>
				<input type="text" name="staffid" />
				<input type="submit" value="search" />
			</form>
		</body>
		</html>