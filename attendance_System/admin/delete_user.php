<?php
	require_once 'db_connect.php';
	$conn->query("DELETE FROM `employee` WHERE `employee_no`= '".$_GET['id']."'");
	$delete = $conn->query("DELETE FROM `users` WHERE `username` = '".$_GET['id']."'");
	if($delete){
		echo json_encode(array("status"=>1,'msg'=>"Data successfully deleted."));
	}
	$conn->close();