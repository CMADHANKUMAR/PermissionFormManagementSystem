<?php
    include('classsession.php');
    ?>
	<html>
	<head></head>
	<body>
	  <h1> WELCOME <?php echo $username; ?></h1>
	  <a href="pending.php">Pending</a>
	  <a href="hfinalapproved.php">Approved </a>
	  <a href="hfinalfailed.php">Failed</a>
	  <a href="hdateactions.php">Search by Date</a>
	  <a href="searchstd.php">Search by student</a>
	  <a href="datetodate.php">Search by date to date</a>
	  
	  <?php
	     $hodnot="SELECT *FROM odrequests WHERE approvalstage=4 and requeststatus='pending'";
		 $hodnotquery=mysqli_query($db,$hodnot);
		 while($hdnotrow = mysqli_fetch_array($hodnotquery,MYSQLI_ASSOC ))
		 {
			 echo '<h3>'.$hdnotrow['requestid'].'</h3><br>';
			 echo '<a href="hdaproove.php?ss='.$hdnotrow['requestid'].'" ><button>aproove</button></a>';
			 echo '<a href="hddisaproove.php?ss='.$hdnotrow['requestid'].'" ><button>disaproove</button></a>';
			 	 if($hdnotrow['eventtype']=="ppt"){
			 $kkkk=$hdnotrow['requestid'];
			 $vqr="SELECT *FROM pptuploads WHERE requestid=$kkkk";
			 $vqry=mysqli_query($db,$vqr);
			 	$kk=mysqli_fetch_array($vqry,MYSQLI_ASSOC );
			 echo '<a href="uploads/'.$kk['filename'].'"$><button>view</button></a>';
			  
			 
		          }
				  if($hdnotrow['eventcategory']=="intercollege")
				  {
					   $kklkk=$hdnotrow['requestid'];
					  $certtqry="SELECT *FROM certificates WHERE requestid=$kklkk";
					  $certqqr=mysqli_query($db,$certtqry);
					  $certqqrr=mysqli_fetch_array($certqqr,MYSQLI_ASSOC);
					   echo '<a href="certificates/'.$certqqrr['filename'].'"$><button>certificate</button></a>';
					  
				  }
				 
			 
			 
			 
		 }
		 ?>