<?php
    include('classsession.php');
   $reoeqid=$_GET['kkl'];
   echo $reoeqid;
   			$intradisapprovesql="UPDATE odrequests SET requeststatus='disapproved' WHERE requestid=$reoeqid";
			$intradisapproveresult=mysqli_query($db,$intradisapprovesql);
			header("location: intraoptions.php")
   
   
   
 ?>