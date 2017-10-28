<?php
    include('classsession.php');
   $redid=$_GET['ss'];
   echo $redid;
   			$hodapprovesql="UPDATE odrequests SET requeststatus='aprooved' WHERE requestid=$redid";
			$hodapproveresult=mysqli_query($db,$hodapprovesql);
			header("location: hodoptions.php")
   
   
   
 ?>