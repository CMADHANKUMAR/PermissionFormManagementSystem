<?php
    include('classsession.php');
   $reodqid=$_GET['kkr'];
   echo $reodqid;
   			$interdisapprovesql="UPDATE odrequests SET requeststatus='disapproved' WHERE requestid=$reodqid";
			$interdisapproveresult=mysqli_query($db,$interdisapprovesql);
			header("location: interoptions.php")
   
   
   
 ?>