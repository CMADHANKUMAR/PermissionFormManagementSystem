<?php
    include('adminsession.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$inid=$_POST['inchargeid'];
			$iname=$_POST['inchargename'];
			$idept=$_POST['inchargedepartment'];
			$itype=$_POST['inchargetype'];
			$imail=$_POST['inchargemail'];
			$ipassword=$_POST['incnformpassword'];
			
			$inquery="INSERT INTO staffdetails VALUES ('$inid','$iname','$idept','','','$itype','$imail','$ipassword')";
			$inqueryxec=mysqli_query($db,$inquery);
			header("location:adminoptions.php");
		}
	
	
	
    ?>
	<form action="" method="post">
	   <label>Incharge id</label>
	   <input type="text" name="inchargeid" /><br>
	   <label>Incharge name</label>
	   <input type="text" name="inchargename" /><br>
	   <label>Incharge department</label>
	    <?php  
       $incharge="SELECT id,department FROM departmentlist";
	   $inchargesql=mysqli_query($db,$incharge);
	   $select='<select name="inchargedepartment">';
		if(mysqli_num_rows($inchargesql))
		{
		
			while($inchargesqlrs=mysqli_fetch_array($inchargesql))
			{
				$select.='<option value="'.$inchargesqlrs['id'].'">'.$inchargesqlrs['department'].'</option>';
			}
		
		}
		$select.='</select>';
		echo $select;
       
   ?><br>
		<label>Incharge type<select name="inchargetype">
								<option value="inter">Inter College Incharge</option>
								<option value="intra">Intra College Incharge</option>
							</select><br>
			
	   <label>Mail id</label>
	   <input type="text" name="inchargemail" /><br>
	   <label>Password</label>
	   <input type="password" name="inpasword" /><br>
	   <label>Conform password</label>
	   <input type="password" name="incnformpassword" />
	   <input type="submit" value="register" />
	 </form>