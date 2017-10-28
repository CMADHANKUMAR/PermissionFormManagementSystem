<?php
		include("config.php");
			if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$namee=$_POST['studentname'];
			$rol=$_POST['studentroll'];
			$dept=$_POST['studentdepartment'];
			$yerr=$_POST['studentyear'];
			$class=$_POST['studentclass'];
			
			$mail=$_POST['mail'];
			$pwd=$_POST['password'];
			$cpwd=$_POST['conformpassword'];
			$passwordSecure=md5($pwd);
			$registersql="INSERT INTO studentdetails VALUES('$namee','$rol','$dept',$yerr,'$class','$mail','$pwd')";
			$result=mysqli_query($db,$registersql);
		    header("location: index.php");
		
		}
		
		
?>
<html>
<head>
	<title>Student Registration</title>
</head>
<body>
 <form action="" method="post">
 <label>Name:</label>
   <input type="text" name="studentname" />
 <br> <label>Roll no:</label>
   <input type="text" name="studentroll" /> 
 <br>  Select the department:
 <?php  
     $depra="SELECT id,department FROM departmentlist";
	$desql=mysqli_query($db,$depra);
	   $select='<select name="studentdepartment">';
		if(mysqli_num_rows($desql))
		{
		
			while($rs=mysqli_fetch_array($desql))
			{
				$select.='<option value="'.$rs['id'].'">'.$rs['department'].'</option>';
			}
		
		}
		$select.='</select>';
		echo $select;
       
?>
<br>Select the year:
<select name="studentyear">
   <option value="1">First</option>
   <option value="2">Second</option>
   <option value="3">Third</option>
   <option value="4">Fourth</option>
 </select>
 <br><label>Select the class</label>
 <select name="studentclass">
    <option value="A">A</option>
    <option value="B">B</option>
	<option value="C">C</option>
	<option value="D">D</option>
</select>
 <br><label>Enter your mail id</label>
 <input type="text" name="studentmail" />
 
 <br><label>Enter the password:</label>
 <input type="password" name="password" />
 <br><label>conform password</label>
 <input type="password" name="conformpassword" />
 <input type="submit" value="signup" />
 </body>
 </html>