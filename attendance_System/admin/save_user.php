<?php
	require_once 'db_connect.php';
	extract($_POST);
		$data = array();
		if(empty($id)){
			$chk = mysqli_query($conn,"SELECT * FROM `users` WHERE `username` = '$username'")->num_rows;
			if($chk > 0){
				$data ['status'] = 2;
				$data['msg'] = 'Username already exist';
			}else{
				$save=mysqli_query($conn,"INSERT INTO users (username,password,firstname,lastname,access) values ('$username','$password','$firstname','$lastname','admin')");
				if($save){
					$data ['status'] =1;
					$data['msg'] = 'Data successfully saved.';
				}
			}
		}else{
		
				mysqli_query($conn,"UPDATE `employee` set `employee`.`firstname` = '$firstname',`employee`.`lastname` = '$lastname' WHERE `employee`.`employee_no` = '$id'");
				$save= mysqli_query($conn,"UPDATE `users` set `users`.`password` = '$password',`users`.`firstname` = '$firstname',`users`.`lastname` = '$lastname' where `users`.`username` ='$id' ");
				if($save){
					$data ['status'] =1;
					$data['msg'] = 'Data successfully updated.';
				}
		
		}

		echo json_encode($data);
	$conn->close()	;