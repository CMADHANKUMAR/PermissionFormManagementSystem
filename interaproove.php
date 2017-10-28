<?php
    include('classsession.php');
   $reedqid=$_GET['kkr'];
   echo $reedqid;
   			$interapprovesql="UPDATE odrequests SET approvalstage=3 WHERE requestid=$reedqid";
			$interapproveresult=mysqli_query($db,$interapprovesql);
			header("location: interoptions.php")
   
   
   
 ?>