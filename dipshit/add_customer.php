<?php
session_start();
require('connect.php');

$name=$_POST['name'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$note=$_POST['note'];
if(isset($_POST['sub'])){
	
	
	$register="INSERT INTO customers(Name,Contact,Address,Note) VALUES('$name','$contact','$address','$note')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:customer.php');

	if($result){
		
	echo '<br>Your information successfully created in Database';
    header('location:customer.php');

	}
	else
	{
	
	echo "Failed to create information in Database";	
	}
	mysqli_close($db_link);
}
?>
