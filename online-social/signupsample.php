<?php
?>
<html>
<body>
<form name="signup" method="post">
First Name: <input type="text" name="fn">
Last Name: <input type="text" name="ln">
Birth Date: <input type="text" name="dob">
Interests: <input type="text" name="interest">
Username: <input type="text" name="un">
Password: <input type="password" name="pwd">
<input type="submit" name="submit" value="Add User">

<?php
if(isset($_POST["submit"])){
	$un=$_POST['un'];
	$pwd=$_POST['pwd'];
	$fn=$_POST['fn'];
	$ln=$_POST['ln'];
	$dob=$_POST['dob'];
	$interest=$_POST['interest'];

	 $results = file_get_contents('http://localhost:9799/ws/signupservice.php?un=' . $un.'&pwd='.$pwd.'&fn='.$fn.'&ln='.$ln.'&dob='.$dob.'&interest='.  $interest);
	 $results = json_decode($results,true);
	 echo $results["message"]; 
}
?>