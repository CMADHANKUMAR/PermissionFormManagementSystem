<?php
    include('classsession.php');
   $reeqstid=$_GET['kk'];
   echo $reeqstid;
   			$classapprovesql="UPDATE odrequests SET approvalstage=2 WHERE requestid=$reeqstid";
			$classapproveresult=mysqli_query($db,$classapprovesql);
			header("location: classteacherentry.php")
   
   
   
 ?>
   