<?php
	include 'connect.php';
	$id = $_GET['id'];
	$sql = "Delete from customers where md5(ID) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:customer.php');
	}else{
		echo "Oppps something error ";
	}
	$db_link->close();
?>