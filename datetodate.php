<?php 
  include('classsession.php');
  ?>
  <html>
  <head>
	</head>
	<body>
	  <form action="" method="post">
	   <label>From date:</label>
	   <input type="date" name="sefrom" /><br>
	   <label>Todate:</label>
	   <input type="date" name="seto" /><br>
	   <input type="submit" value="search" />
	  </form>
	  <?php 
	     if($_SERVER["REQUEST_METHOD"] == "POST")
		         {  
			           
					$searchfrom=date('d/m/y', strtotime($_POST['sefrom']));
					$searchto=date('d/m/y', strtotime($_POST['seto']));
					echo $searchfrom.'<br>'.$searchto;
					$searchbydate="SELECT *FROM odrequests WHERE fromdate BETWEEN '$searchfrom' AND '$searchto' AND studentdepartment='$userdepartment'";
					$searchbydateqry=mysqli_query($db,$searchbydate);
					$searchbydatetotal="SELECT count(requestid) as totals_countdate FROM odrequests WHERE fromdate BETWEEN '$searchfrom' AND '$searchto' AND studentdepartment='$userdepartment'";
					$searchbydatetotalqry=mysqli_query($db,$searchbydatetotal);
					$totalsbydate=mysqli_fetch_assoc($searchbydatetotalqry);
					$searchbydatetotalaproove="SELECT count(requestid) as totalsaproove_countdate FROM odrequests WHERE fromdate BETWEEN '$searchfrom' AND '$searchto' AND requeststatus='aprooved' AND studentdepartment='$userdepartment'";
					$searchbydatetotalaprooveqry=mysqli_query($db,$searchbydatetotalaproove);
					$totalsaproovebydate=mysqli_fetch_assoc($searchbydatetotalaprooveqry);
					$searchbydatetotaldisaproove="SELECT count(requestid) as totalsdisaproove_countdate FROM odrequests WHERE fromdate BETWEEN '$searchfrom' AND '$searchto' AND requeststatus='disaprooved' AND studentdepartment='$userdepartment'";
					$searchbydatetotaldisaprooveqry=mysqli_query($db,$searchbydatetotaldisaproove);
					$totalsdisaproovebydate=mysqli_fetch_assoc($searchbydatetotaldisaprooveqry);
					$searchbydatetotalpend="SELECT count(requestid) as totalspending_countdate FROM odrequests WHERE fromdate BETWEEN '$searchfrom' AND '$searchto' AND requeststatus='pending' AND studentdepartment='$userdepartment'";
					$searchbydatetotalpendqry=mysqli_query($db,$searchbydatetotalpend);
					$totalspendbydate=mysqli_fetch_assoc($searchbydatetotalpendqry);
					
					echo '<h3>total:'.$totalsbydate['totals_countdate'].'</h3>';
					echo '<h3>Aprooved:'.$totalsaproovebydate['totalsaproove_countdate'].'</h3>';
					echo '<h3>Disaprooved:'.$totalsdisaproovebydate['totalsdisaproove_countdate'].'</h3>';
					echo '<h3>Pending:'.$totalspendbydate['totalspending_countdate'].'</h3><hr>';
					
					
					echo '<table>	<tr>';
						echo '<th>S.No</th>';
						echo '<th>Request id</th>';
						echo '<th>Roll no</th>';
						echo '<th>Date</th>';
						echo '<th>Reason</th>';
						echo '<th>Request status</th></tr>';
						
					 for($i=1;$aprow=mysqli_fetch_array($searchbydateqry,MYSQLI_ASSOC);$i++)
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