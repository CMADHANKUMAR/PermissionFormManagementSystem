<?php  
    include('classsession.php');
   ?>
   <html>
   <head>
    </head>
	<body>
	 
	 
	 
	 
	 
	 <form action="" method="post">
	    <label>Enter the date:</label>
	    <input type="date" name="searchdate" />
		<input type="submit" value="search" />
	 </form>
	
	 
	 <?php
				if($_SERVER["REQUEST_METHOD"] == "POST")
		     {	
					 $new_date = date('d/m/y', strtotime($_POST['searchdate']));
					 echo '<h2>Date:'.$new_date.'</h2>';
					 $totalcount="SELECT count(requestid) as total_count FROM odrequests WHERE studentdepartment='$userdepartment' and fromdate=' $new_date'";
					 $totalcountqry=mysqli_query($db,$totalcount);
					 $totalcounts=mysqli_fetch_assoc($totalcountqry);
					 echo'<h1>Total requests:'.$totalcounts['total_count'].'</h3>';
					 $aprovedcount="SELECT count(requestid) as approval_count FROM odrequests WHERE studentdepartment='$userdepartment' and fromdate='$new_date' and requeststatus='aprooved'";
					 $aprovedcountqry=mysqli_query($db,$aprovedcount);
					 $aprovedcounttot=mysqli_fetch_assoc($aprovedcountqry);
					 echo '<h3>Aprooved:'.$aprovedcounttot['approval_count'].'</h3>';
					 $daprovedcount="SELECT count(requestid) as dapproval_count FROM odrequests WHERE studentdepartment='$userdepartment' and fromdate='$new_date' and requeststatus='disaprooved'";
					 $daprovedcountqry=mysqli_query($db,$daprovedcount);
					  $daprovedcounttot=mysqli_fetch_assoc($daprovedcountqry);
					   echo '<h3>Disaprooved:'.$daprovedcounttot['dapproval_count'].'</h3>';
					 $pendcount="SELECT count(requestid) as pend_count FROM odrequests WHERE studentdepartment='$userdepartment' and fromdate='$new_date' and requeststatus='pending'";
					 $pendcountqry=mysqli_query($db,$pendcount);
					  $pendcounttot=mysqli_fetch_assoc($pendcountqry);
					   echo '<h3>Pending:'.$pendcounttot['pend_count'].'</h3>';
						echo '<table>	<tr>';
						echo '<th>S.No</th>';
						echo '<th>Request id</th>';
						echo '<th>Roll no</th>';
						echo '<th>Date</th>';
						echo '<th>Reason</th>';
						echo '<th>Request status</th></tr>';
			
			
			
					   
					   
					   $dateqq="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and fromdate='$new_date'";
						$dateqqrr=mysqli_query($db,$dateqq);
	     for($i=1;$aprow=mysqli_fetch_array($dateqqrr,MYSQLI_ASSOC);$i++)
		{
		   echo '<tr><td>'.$i.'</td>';
		   echo '<td>'.$aprow['requestid'].'</td>';
		   echo '<td>'.$aprow['rollno'].'</td>';
		   
		   echo '<td>'.$aprow['fromdate'].'(period-'.$aprow['fromperiod'].') to<br>'.$aprow['todate'].'(period-'.$aprow['toperiod'].')'.'<br><strong>total:'.$aprow['totalperiods'].'</srong></td>';
		   echo  '<td><strong>'.$aprow['eventname'].'</strong> organised by <br>'.$aprow['eventorganizers'].'<br>for  '.$aprow['eventtype'].' Event</td>';
		   echo '<td><strong>'.$aprow['requeststatus'].'</strong></td>';
		   echo '</tr>';
		}
		echo '</table>';
	   }
		?>
		
						
					   
					   
					  
					 
			 
			 </body>
			 </html> 