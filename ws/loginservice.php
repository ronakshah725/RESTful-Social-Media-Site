<?php 

$un=$_GET['un'];
$pwd=$_GET['pwd'];


$con=mysqli_connect("localhost","root","","social");
 if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array("result" => 0, "message" => "Error");

$result = mysqli_query($con,"select * from login where username='$un' and password='$pwd'");
$count=mysqli_num_rows($result);

if($count==0){
exit(json_encode($data));
}

else{
$data = array("result" => 1, "message" => "Success");
}
mysqli_close($con);
exit(json_encode($data));

?> 