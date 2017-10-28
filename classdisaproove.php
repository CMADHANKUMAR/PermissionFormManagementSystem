<?php
    include('classsession.php');
   $reeeqstid=$_GET['kk'];
   echo $reeeqstid;
   			$classdisapprovesql="UPDATE odrequests SET requeststatus='disapproved' WHERE requestid=$reeeqstid";
			$classdisapproveresult=mysqli_query($db,$classdisapprovesql);
			header("location: classteacherentry.php")
   
   
   
 ?>