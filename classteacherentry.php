<?php
  include('classsession.php');
 ?>
<html>
<head>
		<title>Welcome</title>
  </head>
  <body>
  <h1>Welcome  <?php echo $username; ?></h1>
  <h2 style="color:green">Requests</h2>
  <?php
     if (isset($_GET["page"])) 
    { 
      $page  = $_GET["page"]; 
	} 
	else 
	{ 
      $page=1; 
	}
         $start_from = ($page-1) * 20; 
     $requestquery="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and approvalstage=1 and requeststatus='pending' and year=$useryear and class='$userclass' ORDER BY requestid ASC LIMIT $start_from, 20";
	 $reqquery=mysqli_query($db,$requestquery)or die(mysql_error());
	 while($reqqrow = mysqli_fetch_array( $reqquery,MYSQLI_ASSOC )) 
	{
	   echo '<br><hr>';
         echo '<h3 style="color:red">Request id:'.$reqqrow['requestid'].'</h3><br><hr>';
		 echo '<a href="classapprove.php?kk='.$reqqrow['requestid'].'"><button>approve</button></a>';
		 echo '<a href="classdisaproove.php?kk='.$reqqrow['requestid'].'"$><button>disapprove</button></a>';
		 
		 if($reqqrow['eventtype']=="ppt"){
			 $reqstid=$reqqrow['requestid'];
			 $reqstqry="SELECT *FROM pptuploads WHERE requestid=$reqstid";
			 $reqsqry=mysqli_query($db,$reqstqry);
			 	$reqryrslt=mysqli_fetch_array( $reqsqry,MYSQLI_ASSOC );
			 echo '<a href="uploads/'.$reqryrslt['filename'].'"$><button>view</button></a>';
			 
		 }
	}
	
	/*	 if($reqqrow['eventtype']=="ppt")
						{
							$vqr="SELECT *FROM pptuploads";
								$vqry=mysqli_query($db,$vqr);
							$kk=mysqli_fetch_array($vqry,MYSQLI_ASSOC )
						// echo'<a href="uploads'.$kk['filename'].'">view</a>';
						//}
		//  echo '<br><hr>'; 
    
	                     }
	//}*/
	
  ?> 
  <?php 
  $pagingsql = "SELECT COUNT(requestid) as cnt FROM odrequests WHERE studentdepartment='$userdepartment' and approvalstage=1 and requeststatus='pending'"; 
  $rs_result = mysqli_query($db,$pagingsql); 
  $pagerow = mysqli_fetch_array($rs_result,MYSQLI_ASSOC );
  $total_records = $pagerow['cnt']; 
  $total_pages = ceil($total_records / 20); 
  
for ($i=1; $i<=$total_pages; $i++) { 
            echo '<a href="classteacherentry.php?page='.$i.'">'.$i.'</a>'; 
}; 
?>
  </body>
  </html>