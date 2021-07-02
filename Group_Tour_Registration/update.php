<?php
require("dbconn.php");
$id =$_REQUEST['participantID'];

$sql= "SELECT participant.participantID,participant.firstname,participant.lastname,participant.dateOfBirth,
		participant.gender,participant.passportNum,participant.address,participant.country,participant.dietRestriction,contact.phone,contact.email
		FROM participant
		JOIN contact ON participant.participantID=contact.contactID 
		WHERE participant.participantID='$id'";
$result = mysqli_query($conn, $sql);
$test = mysqli_fetch_array($result);

if (!$result) 
		{
		die("Error: Data not found..");
		}
			$fname=$test['firstname'] ;
			$lname= $test['lastname'] ;					
			$dob=$test['dateOfBirth'] ;
			$gender=$test['gender'] ;
			$passportnum=$test['passportNum'] ;
			$address= $test['address'] ;					
			$country=$test['country'] ;
			$phone=$test['phone'] ;
			$email=$test['email'] ;
			$diet=$test['dietRestriction'] ;

if(isset($_POST['save']))
{	
	$fname_save=$_POST['firstname'] ;
	$lname_save= $_POST['lastname'] ;					
	$dob_save=$_POST['dob'] ;
	$gender_save=$_POST['gender'] ;
	$passportnum_save=$_POST['passportnum'] ;
	$address_save= $_POST['address'] ;					
	$country_save=$_POST['country'] ;
	$phone_save=$_POST['phone'] ;
	$email_save=$_POST['email'] ;
	$diet_save=$_POST['diet'] ;

	
	mysqli_multi_query($conn, "UPDATE participant SET firstname ='$fname_save', lastname ='$lname_save', dateOfBirth ='$dob_save', gender='$gender_save' ,
						passportNum ='$passportnum_save', address ='$address_save', country ='$country_save', dietRestriction='$diet_save' 
						WHERE participantID = '$id';
						UPDATE contact SET phone='$phone_save', email='$email_save WHERE contactID='$id'")
		or die(mysqli_error($conn)); 
	echo "Saved!";
	
	header("Location: index.php");			
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>

<title>Update Data</title>
</head>

<body style="background-color:whitesmoke">

<form method="post">
<center><h1><font color="black"><b>Update Data</b></font></h1><br>
<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="firstname" value="<?php echo $fname ?>"/></td>
		<td>Last Name:</td>
		<td><input type="text" name="lastname" value="<?php echo $lname ?>"/></td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input type="date" style="width:155px" name="dob" value="<?php echo $dob ?>"/></td>
		<td>Gender:</td>
		<td><input type="text" name="gender" value="<?php echo $gender ?>" /></td>

	</tr>
	<tr>
		<td>Passport Number:</td>
		<td><input type="text" name="passportnum" value="<?php echo $passportnum ?>"/></td>
		<td>Address:</td>
		<td><input type="text" name="address" value="<?php echo $address ?>"/></td>
	</tr>
	<tr>
		<td>Country:</td>
		<td><input type="text" name="country" value="<?php echo $country ?>"/></td>
		<td>Phone number:</td>
		<td><input type="tel" name="phone" value="<?php echo $phone ?>"/></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" value="<?php echo $email ?>"/></td>
		<td>Dietary Restriction:</td>
		<td><input type="text" name="diet" value="<?php echo $diet ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="Save" /></td>
	</tr>

</table>

<center><table border="3" cellpadding= "5" cellspacing="0" bgcolor="thistle" width="50%" ><br>
		<tr><td bgcolor='plum'>First Name:</td><td><?php echo $fname ?></td><td bgcolor='plum'>Last Name:</td><td><?php echo $lname ?></td></tr>
		<tr><td bgcolor='plum'>Date of Birth:</td><td><?php echo $dob ?></td><td bgcolor='plum'>Gender:</td><td><?php echo $gender ?></td></tr>
		<tr><td bgcolor='plum'>Passport Number:</td><td><?php echo $passportnum ?></td><td bgcolor='plum'>Address:</td><td><?php echo $address ?></td></tr>
		<tr><td bgcolor='plum'>Country:</td><td><?php echo $country ?></td><td bgcolor='plum'>Phone:</td><td><?php echo $phone ?></td></tr>
		<tr><td bgcolor='plum'>Email:</td><td><?php echo $email ?></td><td bgcolor='plum'>Dietary Restriction:</td><td><?php echo $diet ?></td></tr>
		
</table>			
</body>
</html>
