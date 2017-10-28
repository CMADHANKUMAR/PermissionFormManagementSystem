<?php
   include('config.php');
   session_start();
   
    $userid = $_SESSION['login_userid'];
  
		$session_sql = mysqli_query($db,"SELECT * FROM studentdetails WHERE rollno='$userid'");
		$sessionrow = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
       $username = $sessionrow['name'];
       $userdepartment=$sessionrow['department']; 
       $useryear=$sessionrow['year'];
	   $userclass=$sessionrow['class'];
   if(!isset($_SESSION['login_userid'])){
      header("location:index.php");
    }
   
   ?>