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
			
			
			</tr>
	   <?php
		
		$finaldisapp="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and requeststatus='disaprooved'";
		$finaldisappqry=mysqli_query($db,$finaldisapp);
		
	    for($i=1;$daprow=mysqli_fetch_array($finaldisappqry,MYSQLI_ASSOC);$i++)
		{
		   echo '<tr><td>'.$i.'</td>';
		   echo '<td>'.$daprow['requestid'].'</td>';
		   echo '<td>'.$daprow['rollno'].'</td>';
		   
		   echo '<td>'.$daprow['fromdate'].'(period-'.$daprow['fromperiod'].') to<br>'.$daprow['todate'].'(period-'.$daprow['toperiod'].')'.'<br><strong>total:'.$daprow['totalperiods'].'</srong></td>';
		   echo  '<td><strong>'.$daprow['eventname'].'</strong> organised by <br>'.$daprow['eventorganizers'].'<br>for  '.$daprow['eventtype'].' Event</td>';
		   
		   echo '</tr>';
		   
		}
		?>
		</table>
		</body>
		</html>