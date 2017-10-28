<?php 
  include('adminsession.php');
   $table=$_POST['tabletoview'];
   $viewquery="SELECT *FROM  $table";
   $viewqueryxec=mysqli_query($db,$viewquery);

   $numoffields=mysqli_num_fields($viewqueryxec);
   echo '<h1>Tablename:'.$table.'</h1><table><tr>';
   for($i=0; $i<$numoffields ; $i++)
   {
	   $field=mysqli_fetch_field($viewqueryxec);
	   echo "<td>{$field->name}</td>";
   }
   echo '</tr>';
   while($tbrow = mysqli_fetch_row($viewqueryxec))
   {
	    echo '<tr>';
	   foreach( $tbrow as $tbcell)
	   {
		   
		   echo '<td>'.$tbcell.'</td>';
	   }
	   echo '</tr>';
	   
   }
   echo '<table>';
   
   
   ?>