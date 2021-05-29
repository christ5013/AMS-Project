<?php
	require_once 'db_connect.php';
	extract($_POST);
    $access = $conn->query("SELECT * FROM users");
    $result = $access->fetch_array();
	$qry = $conn->query("SELECT * FROM users WHERE username = '$username' and  password = '$password'" );
	$login = $qry->fetch_array();

    if($result['access'] == 'admin'){

        if($qry->num_rows > 0){
            echo true;
            session_start();
            foreach($login as $k => $v){
                if(!is_numeric($k) && $k !='password')
                $_SESSION['login_'.$k] = $v;
            }
        }
    }else{
        
        if($qry->num_rows > 0){
            session_start();
            foreach($login as $k => $v){
                if(!is_numeric($k) && $k !='password')
                $_SESSION['login_'.$k] = $v;
            }
            header('location:../user/user_home.php');
        }

    }

  
	

	$conn->close();