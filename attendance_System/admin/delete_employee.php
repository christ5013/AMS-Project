<?php
	require_once 'db_connect.php';
	mysqli_query($conn,"DELETE FROM `users` WHERE username = '".$_GET['employee_no']."'");
	$delete = mysqli_query($conn,"DELETE FROM `employee` WHERE `employee_no` = '".$_GET['employee_no']."'");
	if($delete){
		echo json_encode(array("status"=>1,'msg'=>"Data successfully deleted."));
	}
	$conn->close();