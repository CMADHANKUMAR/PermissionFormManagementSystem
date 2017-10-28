<?php
  include('adminsession.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
		         {  
			         $sid=$_POST['sid'];
					 $sname=$_POST['sname'];
					 $sdept=$_POST['sdept'];
					 $syear=$_POST['syear'];
					 $sclass=$_POST['sclass'];
					 $smail=$_POST['smail'];
					 $spass=$_POST['spass'];
					 
					 $sqlupl="SELECT *FROM studentdetails";
					 $sqluplqry=mysqli_query($db,$sqlupl);
					 $sqluplress=mysqli_fetch_assoc($sqluplqry);
					 $mailli=$sqluplress['mail'];
					 
					 $sqlup1="UPDATE studentdetails SET rollno='$sid' WHERE mail='$mailli'";
					 $sqlup1xec=mysqli_query($db,$sqlup1);
					  
					 $sqlup2="UPDATE studentdetails SET name='$sname' WHERE mail='$mailli'";
					 $sqlup2xec=mysqli_query($db,$sqlup2);
					 
					 $sqlup3="UPDATE studentdetails SET department='$sdept' WHERE mail='$mailli'";
					 $sqlup3xec=mysqli_query($db,$sqlup3);
					 
					 $sqlup4="UPDATE studentdetails SET year='$syear' WHERE mail='$mailli'";
					 $sqlup4xec=mysqli_query($db,$sqlup4);
					 
					 $sqlup5="UPDATE studentdetails SET class='$sclass' WHERE mail='$mailli'";
					 $sqlup5xec=mysqli_query($db,$sqlup5);
					 
					 $sqlup6="UPDATE studentdetails SET mail='$smail' WHERE id='$sid'";
					 $sqlup6xec=mysqli_query($db,$sqlup6);
					 
					  
					 $sqlup7="UPDATE studentdetails SET password='$spass' WHERE id='$sid'";
					 $sqlup7xec=mysqli_query($db,$sqlup7);
					 
				 }
					 
					 
					 
					 
					 
					 
					 
					 
?>