<?php
    
		include("config.php");
		session_start();
		
		
		
		  $error="";
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			 // username and password sent from Form
			$myuserid=mysqli_real_escape_string($db,$_POST['userid']);
			$mypassword=mysqli_real_escape_string($db,$_POST['password']);
			$passwordSecure=md5($mypassword);
			$sql="SELECT rollno FROM studentdetails WHERE rollno='$myuserid' and password='$mypassword'";
			$result=mysqli_query($db,$sql);
			//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//$active=$row['active'];
			$count=mysqli_num_rows($result);

			//echo $count;
			// If result matched $myusername and $mypassword, table row must be 1 row
				if($count==1)
				{
					//session_register("myuserid");
					$_SESSION['login_userid']=$myuserid;
		//			echo $_SESSION['login_userid'];
					 header("location: studententry.php");
				}
				else
				{
					$staffuserid=mysqli_real_escape_string($db,$_POST['userid']);
					$staffpassword=mysqli_real_escape_string($db,$_POST['password']);
					$staffpasswordSecure=md5($mypassword);
					//echo $myuserid;
				    //	echo $mypassword;
					$staffsql="SELECT position FROM staffdetails WHERE id='$staffuserid' and password='$staffpassword'";
					$staffresult=mysqli_query($db,$staffsql);
					$staffposrow=mysqli_fetch_array($staffresult,MYSQLI_ASSOC);
					$staffposition=$staffposrow['position'];
					$staffcount=mysqli_num_rows($staffresult);
						//echo $sposition;
					//$x="admin";

					//echo $scount;
					// If result matched $myusername and $mypassword, table row must be 1 row
					if($staffcount==1)
					{
						if($staffposition=="admin")
						{
							//session_register("myuserid");
							$_SESSION['login_userid']=$myuserid;
							//echo $_SESSION['login_userid'];
							header("location: adminoptions.php");
						}
						else if($staffposition=="hod")
						{
							$_SESSION['login_userid']=$myuserid;
							echo $_SESSION['login_userid'];
							header("location: hodoptions.php");
						}
						else if($staffposition=="inter")
						{
							$_SESSION['login_userid']=$myuserid;
							echo $_SESSION['login_userid'];
							header("location: interoptions.php");
						}
						else if($staffposition=="intra")
						{
							$_SESSION['login_userid']=$myuserid;
							echo $_SESSION['login_userid'];
							header("location: intraoptions.php");
						}
					
						else if($staffposition=="class")
						{
							$_SESSION['login_userid']=$myuserid;
							echo $_SESSION['login_userid'];
							header("location: classteacherentry.php");
						}
					}
				
						else					
					{
						$error="Your Login Name or Password is invalid";		
					}
				
				}
		}
		
?>
							<div align="center">
							<form action="" method="post">
								<label>User id:</label>
								<input type="text" name="userid"/><br />
								<label>Password :</label>
								<input type="password" name="password"/><br/>
								<input type="submit" value=" Submit "/><br />
								<?php echo $error; ?>
								</form>
								<a href="studentregistration.php">register here(students only)</a><br>
								<a href="forgotpassword.php">Forgot password</a>
							</div>