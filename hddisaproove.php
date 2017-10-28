<?php
    include('classsession.php');
   $redid=$_GET['ss'];
   echo $redid;
   			$hoddisapprovesql="UPDATE odrequests SET requeststatus='disaprooved' WHERE requestid=$redid";
			$hoddisapproveresult=mysqli_query($db,$hoddisapprovesql);
			header("location: hodoptions.php")
   
   
   
 ?>