<?php 

$un=$_GET['un'];
$desc=urldecode($_GET['des']);
$con=mysqli_connect("localhost","root","","social");
 if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array("result" => 0, "message" => "Error");

$result = mysqli_query($con,"insert into post(username,description) values('$un','$desc')");
if($result){
$data = array("result" => 1, "message" => "Success");
}
mysqli_close($con);
exit(json_encode($data));

?> 