<?php
  include("dbconn.php");  

	$id =$_REQUEST['participantID'];
   $sql = "DELETE FROM participant WHERE participantID='$id';DELETE FROM contact WHERE contactID='$id'";
   
   mysqli_multi_query($conn, $sql) 
   or die(mysql_error());  
   mysqli_close($conn);
	
	header("Location: index.php"); 
?>