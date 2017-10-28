<html>
		<head>
			<title>Search student</title>
		</head>
		<body>
<?php 
   include('adminsession.php');
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$rollno=$_POST['roll'];
			$search="SELECT *FROM studentdetails WHERE rollno='$rollno'";
			$searchxec=mysqli_query($db,$search);
			$searchresult=mysqli_fetch_array($searchxec,MYSQLI_ASSOC);
			
			$searchod="SELECT *FROM odrequests WHERE rollno='$rollno' and requeststatus='aprooved'";
			$searchodxec=mysqli_query($db,$searchod);
			
			
			echo '<h1> Student details </h1><hr> <br>';
			echo'<h3>Name:'.$searchresult['name'].'</h3>';
			echo'<h3>Rollno:'.$searchresult['rollno'].'</h3>';
			echo'<h3>Department:'.$searchresult['department'].'</h3>';
			echo'<h3>Year:'.$searchresult['year'].'</h3>';
			echo'<h3>Class:'.$searchresult['class'].'</h3>';
			echo'<h3>Mail id:'.$searchresult['mail'].'</h3>';
			echo'<h3>Password:'.$searchresult['password'].'</h3><hr>';
			
			
			
			
			echo'<h1>OD details</h1>';
							
			$numbroffields=mysqli_num_fields($searchodxec);
				   echo '<table><tr>';
				   for($i=0; $i<$numbroffields ; $i++)
				   {
					   $searchfield=mysqli_fetch_field($searchodxec);
					   echo "<td>{$searchfield->name}</td>";
				   }
				   echo '</tr>';
				   while($odetailrow = mysqli_fetch_row($searchodxec))
				   {
						echo '<tr>';
					   foreach($odetailrow as $odcell)
					   {
						   
						   echo '<td>'.$odcell.'</td>';
					   }
					   echo '</tr>';
					   
				   }
				   echo '<table>';
				   
								
								
								
								
								
								
								
				
			
			
			
			
			
			
		}
		
		?>
		
			<form action="" method="post" >
				<label>Enter student id</label>
				<input type="text" name="roll" />
				<input type="submit" value="search" />
			</form>
		</body>
		</html>