<!DOCTYPE html>
<html>
<head>
<title>Group Tour Registration</title>
</head>

<body style="background-color:whitesmoke">
<form method="post">
<center><h1><font color="black"><b>Group Tour Registration</b></font></h1><br>
<table>

	<tr>
		<td>First Name:</td>
		<td><input type="text" name="fname" /></td>
		<td>Last Name:</td>
		<td><input type="text" name="lname" /></td>
		
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input style="width:155px" type="date" name="dob" /></td>
		<td>Gender:</td>
		<td><input type="radio" name="gender" value="male" checked> Male
		<input type="radio" name="gender" value="female"> Female<br></td>
	</tr>
	<tr>
		<td>Passport Number:</td>
		<td><input type="text" name="passportNum" /></td>
		<td>Address:</td>
		<td><input type="text" name="address" /></td>
	</tr>
	<tr>
		<td>Country:</td>
		<td><select style="width:160px; height:23px" name=country>
        <option value="malaysia">Malaysia</option>
        <option value="singapore">Singapore</option>
        <option value="canada">Canada</option>
        <option value="london">London</option>
		</select></td>
		<td>Phone Number:</td>
		<td><input type="tel" name="phone" /></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" /></td>
		<td>Dietary Restriction:</td>
		<td><input type="text" name="diet" placeholder="If Yes, please state"/>
			<input type="checkbox" name="diet" value="N/A"/>Not Applied<br></td>

	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Insert" /></td>
	</tr>
</table>

<?php
if (isset($_POST['submit']))
	{	   
	include 'dbconn.php';
	
						$fname=$_POST['fname'] ;
						$lname= $_POST['lname'] ;					
						$dob=$_POST['dob'] ;
						$gender=$_POST['gender'] ;
						$passportnum=$_POST['passportNum'] ;
						$address= $_POST['address'] ;					
						$country=$_POST['country'] ;
						$phone=$_POST['phone'] ;
						$email=$_POST['email'] ;
						$diet=$_POST['diet'] ;
					
							
		mysqli_multi_query($conn, "INSERT INTO `participant`(firstname,lastname,dateOfBirth,gender,passportNum,address,country,dietRestriction) 
							VALUES ('$fname','$lname','$dob','$gender','$passportnum','$address','$country','$diet');
							INSERT INTO `contact`(phone, email) VALUES ('$phone','$email')"); 
				
				
	        }
?>
</form>
<table border="3" cellpadding= "5" cellspacing="0" bgcolor="thistle" width="95%" ><br>
	
			<?php
			include("dbconn.php");
			$sql = "SELECT participant.participantID,participant.firstname,participant.lastname,participant.dateOfBirth,
					participant.gender,participant.passportNum,participant.address,participant.country,participant.dietRestriction,contact.phone,contact.email
					FROM participant
					JOIN contact ON participant.participantID=contact.contactID";
			$result = mysqli_query ($conn, $sql);
			
			echo"<tr bgcolor='darkmagenta' >";
			echo"<th><font color='white'>ID</font></th>";
			echo"<th><font color='white'>First Name</font></th>";
			echo"<th><font color='white'>Last Name</font></th>";
			echo"<th><font color='white'>Date of Birth</font></th>";
			echo"<th><font color='white'>Gender</font></th>";
			echo"<th><font color='white'>Passport No.</font></th>";
			echo"<th><font color='white'>Address</font></th>";
			echo"<th><font color='white'>Country</font></th>";
			echo"<th><font color='white'>Dietary Restriction</font></th>";
			echo"<th><font color='white'>Phone</font></th>";
			echo"<th><font color='white'>Email</font></th>";
			echo"<th colspan='2'><font color='white'>Actions</font></th>";
			echo"</tr>";
			
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['participantID'];	
				echo "<tr align='center'>";	
				echo"<td bgcolor='plum'><font color='black'>" .$test['participantID']."</font></td>";
				echo"<td><font color='black'>" .$test['firstname']."</font></td>";
				echo"<td><font color='black'>". $test['lastname']. "</font></td>";
				echo"<td><font color='black'>". $test['dateOfBirth']. "</font></td>";
				echo"<td><font color='black'>". $test['gender']. "</font></td>";	
				echo"<td><font color='black'>" .$test['passportNum']."</font></td>";
				echo"<td><font color='black'>". $test['address']. "</font></td>";
				echo"<td><font color='black'>". $test['country']. "</font></td>";
				echo"<td><font color='black'>". $test['dietRestriction']. "</font></td>";
				
				echo"<td><font color='black'>" .$test['phone']."</font></td>";
				echo"<td><font color='black'>". $test['email']. "</font></td>";				
				echo"<td> <a href ='update.php?participantID=$id'>Edit</a>";
				echo"<td> <a href ='delete.php?participantID=$id'><center>Delete</center></a>";
									
				echo "</tr>";
				
			}
			mysqli_close($conn);
			?>
</table>
</body>
</html>
