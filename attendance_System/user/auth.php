<?php

include_once '../admin/db_connect.php';
session_start();
if (!isset($_SESSION['login_employee'])) {
header("location:../admin/index.php");
}else{


}
// ?>