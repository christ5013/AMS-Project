<?php
include 'db_connect.php';
	extract($_POST);
	$data= array();
	$qry = $conn->query("SELECT * from employee where employee_no ='$eno' ");
	if($qry->num_rows > 0){
		$emp = $qry->fetch_array();
		$save_log= $conn->query("INSERT INTO attendance (log_type,employee_no) values('$type','".$emp['employee_no']."')");
		$employee = ucwords($emp['firstname'].' '.ucwords($emp['lastname']));
		if($type == 1){
			$log = ' Time In';
		}elseif($type == 2){
			$log = ' Time Out';
		}
		// elseif($type == 3){
		// 	$log = ' time in this afternoon';
		// }elseif($type == 4){
		// 	$log = ' time out this afternoon';
		// }
		if($save_log){
				$data['status'] = 1;
				$data['msg'] = $employee .', your '.$log.' has been recorded. <br/>' ;
			}
	}else{
		$data['status'] = 2;
		$data['msg'] = 'Unknown Employee Number';
	}
	echo json_encode($data);
	$conn->close();
