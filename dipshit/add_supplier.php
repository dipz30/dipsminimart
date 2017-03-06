<?php
session_start();
require('connect.php');

$suppliername=$_POST['suppliername'];
$contactperson=$_POST['contactperson'];
$address=$_POST['address'];
$contactno=$_POST['contactno'];
$note=$_POST['note'];

	
if(isset($_POST['sub'])){
	$register="INSERT INTO supplier(Suppliername,Contactperson,Address,Contactno,Note) VALUES('$suppliername','$contactperson','$address','$contactno','$note')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:supplier.php');
	if($result){
		
	echo '<br>Your information successfully created in Database';
    header('location:supplier.php');

	}
	else
	{
	
	echo "Failed to create information in Database";	
	}
	mysqli_close($db_link);
}
?>
