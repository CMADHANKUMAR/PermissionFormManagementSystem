<?php
    include('adminsession.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			echo $adid=$_POST['advisorid'];
			echo 	$adname=$_POST['advisorname'];
			echo 	$addept=$_POST['advisordepartment'];
			echo 	$adyear=$_POST['advisoryear'];
			echo 	$adclass=$_POST['advisorclass'];
			echo 	$admail=$_POST['advisormail'];
			echo 	$adpassword=$_POST['aconformpassword'];
				
				$advisorr="INSERT INTO staffdetails VALUES('$adid','$adname','$addept','$adyear','$adclass','class','$admail','$adpassword')";
				$advisorrqryxec=mysqli_query($db,$advisorr);
				header("location: adminoptions.php");







			
			
			
			}
	
	
	
    ?>
	<form action="" method="post">
	   <label>Advisor id</label>
	   <input type="text" name="advisorid" /><br>	
	   <label>Advisor name</label>
	   <input type="text" name="advisorname" /><br>
	   <label>Advisor department</label>
	       <?php  
				$advisordept="SELECT id,department FROM departmentlist";
			   $addeptsql=mysqli_query($db,$advisordept);
			   $aselect='<select name="advisordepartment">';
		if(mysqli_num_rows($addeptsql))
		{
		
			while($addeptsqlrs=mysqli_fetch_array($addeptsql))
			{
				$aselect.='<option value="'.$addeptsqlrs['id'].'">'.$addeptsqlrs['department'].'</option>';
			}
		
		}
		$aselect.='</select>';
		echo $aselect;
       
   ?><br>
		   <label>Advisor year</label>
			  <select name="advisoryear">
					   <option value="1">First</option>
					   <option value="2">Second</option>	  
					   <option value="3">Third</option>	
					   <option value="4">Fourth</option>
			  </select><br>
			<label>Advisor class</label>
			  <select name="advisorclass">
						<option value="A">A</option>
					    <option value="B">B</option>
					    <option value="C">C</option>
					    <option value="D">D</option>
				</select><br>
					   
			   
	   
	   
	   
	   
	   
	   	<label>Advisor mailid</label>
	   <input type="text" name="advisormail" /><br>
	   	   <label>Password</label>
	   <input type="password" name="apassword" /><br>
	   	   <label>Conform password</label>
	   <input type="password" name="aconformpassword" /><br>
	   <input type="submit" value="register" />
	</form>