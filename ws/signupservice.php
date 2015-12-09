<?php 

$un=$_GET['un'];
$pwd=$_GET['pwd'];
$fn=$_GET['fn'];
$ln=$_GET['ln'];
$dob=$_GET['dob'];
$interest=$_GET['interest'];

$con=mysqli_connect("localhost","root","","social");
 if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array("result" => 0, "message" => "Error");
$result = mysqli_query($con,"select * from login where username='$un'");
$count=mysqli_num_rows($result);
if($count>0){
exit(json_encode($data));
}
else{
$status = 0; 
$query = "insert into login VALUES ('$un','$pwd','$fn','$ln','$dob','$interest')";
$insert = mysqli_query($con,$query);

if($insert)
	$data = array("result" => 1, "message" => "Successfully user added!");
 
}
mysqli_close($con);
exit(json_encode($data));

?> 