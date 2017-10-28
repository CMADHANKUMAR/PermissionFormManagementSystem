<?php 
       include('classsession.php');
	   ?>
	   <html>
	   <head>
	   </head>
	   <body>
	   <table>
	     <tr>
		    <th>S.No</th>
			<th>Request id</th>
			<th>Roll no</th>
			<th>Date</th>
			<th>Reason</th>
			<th>Pending stage</th>
			
			
			</tr>
	   <?php
		
		$finalapp="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and requeststatus='pending'";
		$finalappqry=mysqli_query($db,$finalapp);
		
	    for($i=1;$aprow=mysqli_fetch_array($finalappqry,MYSQLI_ASSOC);$i++)
		{
		   echo '<tr><td>'.$i.'</td>';
		   echo '<td>'.$aprow['requestid'].'</td>';
		   echo '<td>'.$aprow['rollno'].'</td>';
		   
		   echo '<td>'.$aprow['fromdate'].'(period-'.$aprow['fromperiod'].') to<br>'.$aprow['todate'].'(period-'.$aprow['toperiod'].')'.'<br><strong>total:'.$aprow['totalperiods'].'</srong></td>';
		   echo  '<td><strong>'.$aprow['eventname'].'</strong> organised by <br>'.$aprow['eventorganizers'].'<br>for  '.$aprow['eventtype'].' Event</td>';
		   echo '<td>'.$aprow['approvalstage'].'</td>';
		   echo '</tr>';
		   
		}
		?>
		</table>
		</body>
		</html>