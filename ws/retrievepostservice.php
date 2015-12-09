<?php 

$un=$_GET['un'];

$con=mysqli_connect("localhost","root","","social");
 if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array("result" => 0, "message" => "No Post");


$result = mysqli_query($con,"select * from post where username='$un' or username IN 
			(select fol_username from follower where username='$un')");
$count=mysqli_num_rows($result);
if($count==0){
exit(json_encode($data));
}
$response=array();
$i=0;
while($row = mysqli_fetch_array($result))
{
	$response[$i]['postid'] = $row["postid"];
	$response[$i]['username'] = $row["username"];
	$response[$i]['description'] = $row["description"];
	$postid=$row["postid"];	
	$resultrep= mysqli_query($con,"select * from reply where postid='$postid'");
	$response[$i]['replies']=array();
	while($rowrep= mysqli_fetch_array($resultrep))
	{
		$response[$i]['replies'][]=$rowrep["reply"];
	}
$i=$i+1;
} 

mysqli_close($con);
exit(json_encode($response));

?> 