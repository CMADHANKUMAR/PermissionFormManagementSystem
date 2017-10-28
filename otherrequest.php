<?php
   include('studentclasssession.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{ 
	       
			$fromdate=date('d/m/y', strtotime($_POST['fromdat']));
			$fromperiod=$_POST['fromperiod'];
	
				$todate=date('d/m/y', strtotime($_POST['todat']));
			$toperiod=$_POST['totperiod'];
			$totalperiods=$_POST['totperiod'];
			  $club=$_POST['clubi'];
			  $reason=$_POST['reason'];
			  $eventtype=$_POST['evttyp'];
			  
			  
			  
			  $cumulativesql="SELECT sum(totalperiods) as totalsum from odrequests WHERE rollno='$userid' and requeststatus='approved'";
		$cumulativeresult=mysqli_query($db,$cumulativesql);
		$cumulativerow=mysqli_fetch_array($cumulativeresult,MYSQLI_ASSOC);
		$cumulative=$cumulativerow['totalsum'];
		
		$requesttime=date("Y-m-d H:i:s");
		
			  
			  $odreqq="INSERT INTO odrequests VALUES('','$reason','intercollege','$eventtype','$club','$fromdate','$fromperiod','$todate','$toperiod','$totalperiods','1','pending','$cumulative','$userid','$userdepartment','$useryear','$userclass','$requesttime','$requesttime')";
			   $odreqqxec=mysqli_query($db,$odreqq);
			  
		}	  
			  
   
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
		<form action="" method="post" >
		 <label>Select the club:</label>
		 <select name="clubi">
		 <?php
		    $clubsqql="SELECT *FROM kecclubs";
			 $clubsqqlqry=mysqli_query($db,$clubsqql);
			 
			 while($clubrow=mysqli_fetch_assoc($clubsqqlqry))
			 {
				 
				 
				 echo '<option value="'.$clubrow['Clubname'].'">'.$clubrow['Clubname'].'</option>';
				 
				 
			 }
			 ?>
		 
		 </select>
		 
		 <br>
		 <label>PPT ?</label>
		 <input type="radio" name="evttyp" value="ppt" />Yes
		 <input type="radio" name="evttyp" value="other" />No
		 
		 <label>Reason</label>
		 <input type="text"  name="reason" /><br>
		 <h1>From</h1>
		 <label>Date</label>
		 <input type="date" name="fromdat" /><br>
		 <label>Period</label>
		 <input type="number" name="fromperiod" /><br>
		 <h1>To</h1>
		 <label>Date</label>
		 <input type="date" name="todat" /><br>
		 <label>Period</label>
		 <input type="number" name="toperiod" /><br>
		 
		 <label>Total periods</label>
		 <input type="number" name="totperiod" />
		 <input type="submit" value="register" />
		 </form>
		 
		 
		
		
		
	</body>
	   
</html>