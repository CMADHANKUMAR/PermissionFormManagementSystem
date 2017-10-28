<?php
   include('studentclasssession.php');
    
   if($_SERVER["REQUEST_METHOD"] == "POST")	
   {	 $frequestid=$_POST['cerid'];
			
		

             
    
						
						$file =$frequestid."-".$_FILES['pptfile']['name'];
						$file_loc = $_FILES['pptfile']['tmp_name'];
						$file_size = $_FILES['pptfile']['size'];
						$file_type = $_FILES['pptfile']['type'];
						
						$folder="certificates/";
                       
						// new file size in KB
						$new_size = $file_size/1024; 
						
                         					
						    // new file size in KB
						

							// make file name in lower case
							 $new_file_name = strtolower($file);
							// make file name in lower case

  							$final_file=str_replace(' ','-',$new_file_name);

							if(move_uploaded_file($file_loc,$folder.$file))
							{
								
								
								$fillsql="INSERT INTO certificates VALUES($frequestid,'$final_file','$file_type','$new_size')";
										$fillsqlquery=mysqli_query($db,$fillsql);
								$updatesql="UPDATE odrequests SET approvalstage=4 WHERE requestid=$frequestid";
								$updatesqry=mysqli_query($db,$updatesql);
								?>
								<script>
								alert('Your response has been registerd');
								window.location.href='studententry.php';
								</script>
							<?php
							}
						
					//	echo $new_size;
								
			
			
			
			
			
		
   }	
   
?>
<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>
	  <a href="odrequest.php">Request OD</a>
	  <a href="studentoptions.php">Notifications</a>
	    
	  
		<h1 style="color:red">Welcome <?php echo $username; ?></h1>
		<?php
		     $stnotsql="SELECT *FROM odrequests WHERE rollno='$userid' and approvalstage=3 and requeststatus='pending'";
		     $stnotsqlquery=mysqli_query($db,$stnotsql);
			 while($stnotrow = mysqli_fetch_array($stnotsqlquery ,MYSQLI_ASSOC )) 
			{   ?><form action="" method="POST" enctype="multipart/form-data">
    <label>Please upload your .ppt file:	</label>
    <input type="file" name="pptfile" id="myFile"  accept="image/gif,image/jpeg" /><br>

	  <input type="hidden" value="<?php echo $stnotrow['requestid']; ?>" name="cerid" />
	  <input type="submit" value="submit" />
	  </form>
	  <?php
		               }
			 
		
		
		
		
		?>
		
		
		
		
	 	</body>
	   
</html>