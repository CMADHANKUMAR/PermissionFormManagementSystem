<html>
<head>
</head>
<body>

<?php
   $err="";
   include('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$userid=$_POST['userid'];
			
			$forgotquery="SELECT *FROM studentdetails WHERE rollno='$userid'";
			$forgotqueryxec=mysqli_query($db,$forgotquery);
			$forgotcount=mysqli_num_rows($forgotqueryxec);
			
			if($forgotcount==1)
			{
				$forgotdetail=mysqli_fetch_array($forgotqueryxec,MYSQLI_ASSOC);
				$sendmail=$forgotdetail['mail'];
				$sendpass=$forgotdetail['password'];
				$to=$sendmail;
				  $subject='Remind password';
				  $message='Your password : '.$sendpass; 
				  $headers='From:smartmadhankumar@gmail.com';
				  $m=mail($to,$subject,$message,$headers);

						 if($m)
						  {
							echo'Check your inbox in mail';
						  }
						  else
						  {
						   echo'mail is not send';
						  }
				
				
			}
			else
			{
				$err="invalid username or password";
				
			}
			
		}
  


?>
<form action="" method="post">
  <label>User id</label>
  <input type="text" name="userid" />
  <input type="submit" value="send me mail" />
</form><br><?php echo $err; ?>
</body>
</html>