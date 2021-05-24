<?php
	include 'db_connect.php';
		extract($_POST);
		if(empty($id)){
				$i= 1;
				while($i == 1){
				$e_num=date('Y') .'-'. mt_rand(1,9999);
					$chk  = $conn->query("SELECT * FROM employee where employee_no = '$e_num' ")->num_rows;
					if($chk <= 0){
						$i = 0;
					}
				}
				// echo "INSERT INTO `employee` VALUES('', '$e_num','$firstname', '$middlename', '$lastname', '$department', '$position')";
				// exit;
				$save =mysqli_query($conn,"INSERT INTO employee VALUES('','$e_num','$firstname', '$middlename', '$lastname', '$department', '$position','','')") or die(mysqli_error($conn));
				// $save= $conn->query("INSERT INTO `employee`  VALUES ('$e_num','$firstname', '$middlename', '$lastname', '$department', '$position')");
				mysqli_query($conn,"INSERT INTO `users` (`username`,`firstname`,`lastname`,`access`) VALUES ('$e_num','$firstname', '$lastname','$access')");
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Saved"));
				}		
		}else{
			$save=mysqli_query($conn,"UPDATE `employee`,`users` set `employee`.`firstname`='$firstname',`employee`.`middlename` = '$middlename',`employee`.`lastname`='$lastname',`employee`.`department`='$department',`employee`.`position`='$position',`users`.`access` ='$access' where `employee`.`employee_no`= '$id' and `users`.`username`='$id' ");
			
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
				}
			// mysqli_query($conn,"UPDATE users set firstname = '$firstname',lastname='$lastname' WHERE username='$id'");
			// $save=mysqli_query($conn,"UPDATE `employee`,`users` set `employee`.`firstname`='$firstname',`employee`.`middlename`='$middlename',`employee`.`lastname`='$lastname',`employee`.`position`='$position',`employee`.`department`='$department',`users`.`acces` ='$access' where `employee`.`employee_no`= $id and `users`.`username`='$id' ");
			
			// 	if($save){
			// 			echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
			// 	}
		}	

$conn->close();