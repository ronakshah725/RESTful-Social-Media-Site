<?php 
session_start();
$postid=$_GET['postid'];
$txt=$_GET["txt"];
$txt=urldecode($txt);
$con=mysqli_connect("localhost","root","","social");
 if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array("result" => 0, "message" => "Error");

$result = mysqli_query($con,"insert into reply(postid,reply) values('$postid','$txt')");
if($result){
$data = array("result" => 1, "message" => "Success");
}
mysqli_close($con);
echo json_encode($data);

?> 