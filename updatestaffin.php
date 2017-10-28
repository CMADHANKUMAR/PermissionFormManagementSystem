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
					 
					 $sqlupl="SELECT *FROM staffdetails";
					 $sqluplqry=mysqli_query($db,$sqlupl);
					 $sqluplress=mysqli_fetch_assoc($sqluplqry);
					 $mailli=$sqluplress['mail'];
					 
					 $sqlup1="UPDATE staffdetails SET id='$sid' WHERE mail='$mailli'";
					 $sqlup1xec=mysqli_query($db,$sqlup1);
					  
					 $sqlup2="UPDATE staffdetails SET name='$sname' WHERE mail='$mailli'";
					 $sqlup2xec=mysqli_query($db,$sqlup2);
					 
					 $sqlup3="UPDATE staffdetails SET department='$sdept' WHERE mail='$mailli'";
					 $sqlup3xec=mysqli_query($db,$sqlup3);
					 
					 $sqlup4="UPDATE staffdetails SET year='$syear' WHERE mail='$mailli'";
					 $sqlup4xec=mysqli_query($db,$sqlup4);
					 
					 $sqlup5="UPDATE staffdetails SET class='$sclass' WHERE mail='$mailli'";
					 $sqlup5xec=mysqli_query($db,$sqlup5);
					 
					 $sqlup6="UPDATE staffdetails SET mail='$smail' WHERE id='$sid'";
					 $sqlup6xec=mysqli_query($db,$sqlup6);
					 
					  
					 $sqlup7="UPDATE staffdetails SET password='$spass' WHERE id='$sid'";
					 $sqlup7xec=mysqli_query($db,$sqlup7);
					 
				 }
					 
					 
					 
					 
					 
					 
					 
					 
?>