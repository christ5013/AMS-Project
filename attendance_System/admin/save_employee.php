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
				
				$save =mysqli_query($conn,"INSERT INTO employee VALUES('','$e_num','$firstname', '$middlename', '$lastname', '$department', '$position','','')") or die(mysqli_error($conn));
				
				mysqli_query($conn,"INSERT INTO `users` (`username`,`firstname`,`lastname`,`access`) VALUES ('$e_num','$firstname', '$lastname','$access')");
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Saved"));
				}		
		}else{
			mysqli_query($conn,"UPDATE `users` set `users`.`firstname` = '$firstname',`users`.`lastname`='$lastname',`users`.`access` ='$access' WHERE `users`.`username` = '$id'");
			$save=mysqli_query($conn,"UPDATE `employee` set `employee`.`firstname`='$firstname',`employee`.`middlename` = '$middlename',`employee`.`lastname`='$lastname',`employee`.`department`='$department',`employee`.`position`='$position' where `employee`.`employee_no`= '$id' ");
			
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
				}
			
		}	

$conn->close();