<?php
    include('classsession.php');
   $reeeqid=$_GET['kkl'];
   echo $reeeqid;
   			$intrapprovesql="UPDATE odrequests SET approvalstage=4 WHERE requestid=$reeeqid";
			$intraapproveresult=mysqli_query($db,$intrapprovesql);
			header("location: intraoptions.php")
   
   
   
 ?>