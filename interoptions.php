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
    $interapsql="SELECT *FROM odrequests WHERE studentdepartment='$userdepartment' and approvalstage=2 and eventcategory='intercollege' and requeststatus='pending'";
	$interapqry=mysqli_query($db,$interapsql) ;//or die(mysql_error());
	 while($interaqrow = mysqli_fetch_array( $interapqry,MYSQLI_ASSOC )) {
		  echo '<h3 style="color:red">Request id:'.$interaqrow['requestid'].'</h3><br><hr>';
		 echo '<a href="interaproove.php?kkr='.$interaqrow['requestid'].'"><button>approve</button></a>';
		 echo '<a href="interdisaproove.php?kkr='.$interaqrow['requestid'].'"$><button>disapprove</button></a>';
		 	 if($interaqrow ['eventtype']=="ppt"){
			 $kkkk=$interaqrow['requestid'];
			 $vqr="SELECT *FROM pptuploads WHERE requestid=$kkkk";
			 $vqry=mysqli_query($db,$vqr);
			 	$kk=mysqli_fetch_array($vqry,MYSQLI_ASSOC );
			 echo '<a href="uploads/'.$kk['filename'].'"$><button>view</button></a>';
			 
		 }
	 }
  
 ?> 
  </body>
  </html>