<?php
  include('intersession.php');
 ?>
<html>
<head>
		<title>Welcome</title>
  </head>
  <body>
  <h1>Welcome  <?php echo $username; ?></h1>
  <h2 style="color:green">Requests</h2>
    <h2 ><?php echo $username; ?></h2>
<?php
    $intrapsql="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and approvalstage=1 and eventcategory='intracollege' and requeststatus='pending'";
	$intrapqry=mysqli_query($db,$intrapsql) ;//or die(mysql_error());
	 while($intraqrow = mysqli_fetch_array( $intrapqry,MYSQLI_ASSOC )) {
		  echo '<h3 style="color:red">Request id:'.$intraqrow['requestid'].'</h3><br><hr>';
		 echo '<a href="intraproove.php?kkl='.$intraqrow['requestid'].'"><button>approve</button></a>';
		 echo '<a href="intradisaproove.php?kkl='.$intraqrow['requestid'].'"$><button>disapprove</button></a>';
		 	 if($intraqrow ['eventtype']=="ppt"){
			 $kkkk=$intraqrow['requestid'];
			 $vqr="SELECT *FROM pptuploads WHERE requestid=$kkkk";
			 $vqry=mysqli_query($db,$vqr);
			 	$kk=mysqli_fetch_array($vqry,MYSQLI_ASSOC );
			 echo '<a href="uploads/'.$kk['filename'].'"$><button>view</button></a>';
			 
		 }
	 }
  
 ?> 
  </body>
  </html>
   