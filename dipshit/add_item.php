<?php
session_start();
require('connect.php');

$category=$_POST['category'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$purchase=$_POST['purchase'];
$retail=$_POST['retail'];
$supplier=$_POST['supplier'];
if(isset($_POST['sub'])){
	
	
	$register="INSERT INTO products(Category,Name,Quantity,Purchase,Retail,Supplier) VALUES('$category','$name','$quantity','$purchase','$retail','$supplier')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);

	if($result){
		
	echo '<br>Your information successfully created in Database';
    header('location:products.php');

	}
	else
	{
	
	echo "Failed to create information in Database";	
	}
	mysqli_close($db_link);
}
?>
