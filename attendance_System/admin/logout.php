<?php
	session_start();
	session_unset('login_id');
	session_unset('login_employee');
	session_destroy();
	header('location:index.php');