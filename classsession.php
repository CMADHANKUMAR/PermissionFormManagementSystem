<?php
	include('config.php');
	session_start();
   
    $userid = $_SESSION['login_userid'];
  
		$session_sql = mysqli_query($db,"SELECT * FROM staffdetails WHERE id='$userid'");
		$classrow = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
    $username = $classrow['name'];
    $userdepartment=$classrow['department']; 
	$useryear=$classrow['year'];
	$userclass=$classrow['class'];
    	
   if(!isset($_SESSION['login_userid'])){
      header("location:index.php");
    }
	
?>