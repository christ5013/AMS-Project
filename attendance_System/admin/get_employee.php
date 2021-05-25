<?php
	include 'db_connect.php';
		extract($_POST);
		$data=array();
		$get=$conn->query("SELECT `employee`.employee_no,`employee`.`firstname`,`employee`.`middlename`,`employee`.`lastname`,`employee`.`department`,`employee`.`position`,`users`.`access` FROM `employee` CROSS JOIN `users` where `employee_no`='$id' and `users`.`username`='$id'");
		
		if($get->num_rows > 0 ){
			$data = $get->fetch_array();
			
		}		
		echo json_encode($data);
$conn->close();	