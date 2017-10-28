<?php
	include('studentclasssession.php');
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{ 
	
		$eventname=$_POST['eventname'];

		$eventcatagory=$_POST['eventcatagory'];
		$eventtype=$_POST['eventtype'];
		$eventorganizers=$_POST['eventorganizer'];
	
		$fromdate=date('d/m/y', strtotime($_POST['fromdate']));
		$fromperiod=$_POST['fromperiod'];
	
		$todate=date('d/m/y', strtotime($_POST['todate']));
		$toperiod=$_POST['toperiod'];
		$totalperiods=$_POST['totalperiod'];
	 
		echo $eventname."<br>";
		echo  $eventcatagory."<br>";
		echo  $eventtype."<br>";
		echo $eventorganizers."<br>";
		echo $fromdate."<br>";
		echo $fromperiod."<br>";
		echo $todate."<br>";
		echo $toperiod."<br>";
		echo  $totalperiods."<br>";
		echo $userid."<br>";
		echo $username."<br>";
		echo $userdepartment."<br>";
		$requesttime=date("Y-m-d H:i:s");
		echo $requesttime."<br>";

		
		$cumulativesql="SELECT sum(totalperiods) as totalsum from odrequests WHERE rollno='$userid' and requeststatus='approved'";
		$cumulativeresult=mysqli_query($db,$cumulativesql);
		$cumulativerow=mysqli_fetch_array($cumulativeresult,MYSQLI_ASSOC);
		$cumulative=$cumulativerow['totalsum'];
		echo $cumulative."<br>jj";
	    $requestinsertsql="INSERT INTO odrequests VALUES('','$eventname','$eventcatagory','$eventtype','$eventorganizers','$fromdate',$fromperiod,'$todate',$toperiod,$totalperiods,1,'pending','$cumulative','$userid','$userdepartment','$useryear','$userclass','$requesttime')";
	    $requestinsertresult=mysqli_query($db,$requestinsertsql);

	   
	   		if($eventtype=="ppt")
		{
			
			
						$filesql="SELECT requestid FROM odrequests WHERE requesttime='$requesttime' and rollno='$userid'";
						$filequery=mysqli_query($db,$filesql);
						$filerequestid=mysqli_fetch_array($filequery,MYSQLI_ASSOC);
					$frequestid=$filerequestid['requestid'];
               

             
    
						$file =$frequestid."-".$_FILES['pptfile']['name'];
						$file_loc = $_FILES['pptfile']['tmp_name'];
						$file_size = $_FILES['pptfile']['size'];
						$file_type = $_FILES['pptfile']['type'];
						
						$folder="uploads/";
                       
						// new file size in KB
						$new_size = $file_size/1024; 
						
                         					
						    // new file size in KB
						

							// make file name in lower case
							 $new_file_name = strtolower($file);
							// make file name in lower case

  							$final_file=str_replace(' ','-',$new_file_name);

							if(move_uploaded_file($file_loc,$folder.$file))
							{
								
								
								$fillsql="INSERT INTO pptuploads VALUES($frequestid,'$final_file','$file_type','$new_size')";
										$fillsqlquery=mysqli_query($db,$fillsql);
								?>
								<script>
								alert('Your response has been registerd');
								window.location.href='studententry.php';
								</script>
							<?php
							}
						
					//	echo $new_size;
								
			
			
			
			
			
		}
		
 
 
 
 
 
 
 
	}
 
 
?>
<html>
<head>
	<title>Request form</title>
	<script>
function disableBtn() {
    document.getElementById("myFile").disabled = true;
}

function undisableBtn() {
    document.getElementById("myFile").disabled = false;
}
</script>
</head>
<body>
  <div align="center" >
  <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validation(this)">
    <label>Event name:</label>
    <input type="text" name="eventname" /><br>
	<label>Event catagory:</label>
	<select name="eventcatagory">
	  <option value="intercollege">Intercollege event</option>
	  <option value="intracollege">Intracollege event</option>
	</select><br>
    <label>Event Organizers:</label>

	
	<input type="text" name="eventorganizer" /><br>
    <label >Event type:</label>
	<input type="radio" name="eventtype" value="ppt"  onclick="undisableBtn()" checked />Paper Presentation
    <input type="radio" name="eventtype" value="other"  onclick="disableBtn()" />Other events
	<br>
    <label>Please upload your .ppt file:	</label>
    <input type="file" name="pptfile" id="myFile"  accept="application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation"  /><br>
								
	<h2>From</h2><br>
	<label>Date:</label>
	<input type="date" name="fromdate" /><br>
	<label>Period:</label>
	<input type="number" name="fromperiod" /><br>
	<h2>To</h2>
	<label>Date:</label>
	<input type="date" name="todate" /><br>
	<label>Period :</label>
	<input type="number" name="toperiod" /><br>
	<label>Total periods:</label>
	<input type="number" name="totalperiod" /><br>
	<input type="submit" value="submit" />
  </form>
  </div>
 </body>
 </html>
	
	