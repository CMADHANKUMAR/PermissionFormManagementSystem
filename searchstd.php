<?php
    include('classsession.php');
 ?>
 <html>
 <head></head>
 <body>
 <form action="" method="post">
    <input list="roll" name="roll" autocomplete="off"/>
    <datalist id="roll">
   <?php
            $hstd="SELECT *FROM studentdetails WHERE department='$userdepartment'";
			$hstdqr=mysqli_query($db,$hstd);
			 while($rollnumber=mysqli_fetch_array($hstdqr,MYSQLI_ASSOC))
			 {
				 echo '<option value="'.$rollnumber['rollno'].'">'.$rollnumber['rollno'].'</option>';
			 }
		              echo '</datalist>';
				
			  ?>
			<input type="submit" value="search" />
		<?php
		    	if($_SERVER["REQUEST_METHOD"] == "POST")
		         {  
			           
					     $rollnim=$_POST['roll'];
				   
			            $stddet="SELECT *FROM studentdetails WHERE rollno='$rollnim' AND department='$userdepartment'";
						$stddetqry=mysqli_query($db,$stddet);
						$stddetqryrow=mysqli_fetch_assoc($stddetqry);
						echo '<div><h1 style="text-align:center">Student details:</h1><hr>';
						echo '<table style="text-align:left"><tr><th>Name:</th><td>'.$stddetqryrow['name'].'</td></tr>';
						echo '<tr><th>Roll no:</th><td>'.$stddetqryrow['rollno'].'</td></tr>';
						echo '<tr><th>Department:</th><td>'.$stddetqryrow['department'].'</td></tr>';
						echo '<tr><th>Year:</th><td>'.$stddetqryrow['year'].'</td></tr>';
						echo '<tr><th>Class:</th><td>'.$stddetqryrow['class'].'</td></tr>';
						echo '<tr><th>E-mail:</th><td>'.$stddetqryrow['mail'].'</td></tr></table><hr>';
						
						
						
						echo '<table>	<tr>';
						echo '<th>S.No</th>';
						echo '<th>Request id</th>';
						
						echo '<th>Date</th>';
						echo '<th>Reason</th>';
						echo '<th>Cumulative</th></tr>';
						
						
					   $searchrolll="SELECT *FROM odrequests WHERE rollno='$rollnim' and requeststatus='aprooved' AND studentdepartment='$userdepartment'";
						$searchrolllqry=mysqli_query($db,$searchrolll);
			            $stddet="SELCT *FROM studentdetails WHERE rollno='$rollnim'";
						$stddetqry=mysqli_query($db,$stddet);
						
						
						
			
			
				
	     for($i=1;$saprow=mysqli_fetch_array($searchrolllqry,MYSQLI_ASSOC);$i++)
		{
		   echo '<tr><td>'.$i.'</td>';
		   echo '<td>'.$saprow['requestid'].'</td>';
		   
		   
		   echo '<td>'.$saprow['fromdate'].'(period-'.$saprow['fromperiod'].') to<br>'.$saprow['todate'].'(period-'.$saprow['toperiod'].')'.'<br><strong>total:'.$saprow['totalperiods'].'</srong></td>';
		   echo  '<td><strong>'.$saprow['eventname'].'</strong> organised by <br>'.$saprow['eventorganizers'].'<br>for  '.$saprow['eventtype'].' Event</td>';
		   echo '<td><strong>'.$saprow['cumulative'].'</strong></td>';
		   echo '</tr>';
		}
		echo '</table>';
				 }
		
		
		?>
		
			  </body>
			  </html>
			