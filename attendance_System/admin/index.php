<!DOCTYPE html>
<?php



     require_once 'db_connect.php';
	 session_start();



	 if (isset($_POST['loginBtn'])) {
    
		$username=$_POST['username'];
		$password=$_POST['password'];
	
	  
	
		$query = "SELECT * FROM users WHERE username= '$username' && password ='$password' && access='admin' ";
		$data =  mysqli_query($conn, $query);
		$total =  mysqli_num_rows($data);
		
	 
		$row=mysqli_fetch_array($data);
	
		$queryemployee = "SELECT * FROM users WHERE username= '$username' && password ='$password' && access='employee' ";
		$data2 =  mysqli_query($conn, $queryemployee);
		$total2 =  mysqli_num_rows($data2);
		
	 
		$row2=mysqli_fetch_array($data2);
		
	
	
	   if($total == 1){
			   
	  
		   $_SESSION['login_id'] = $username;
		   
		   header("location:/AMS-Project/attendance_System/admin/home.php");

		  
	
		//   }
			  
	   }


	   elseif($total2 == 1){

		$_SESSION['login_employee'] = $username;
		   
		header("location:/AMS-Project/attendance_System/user/user_home.php");


	   }
	   else{
		   
		header("location:index.php");
	   
		
		//    echo "<script type>document.getElementById('wrong').modal('show');</script>";
	   }

	   //QUERY FOR THE USER WITH ACCESS OF EMPLOYEE



	   }
	   
	
?>
<html lang = "eng">
	<head>
		<title>Employee Attendance Record System</title>
		<?php include 'header.php' ?>
	</head>
	<body>
	<div class="container ">
        <div class="row ">
            <div class="col-lg-3 col-md-2 "></div>
            <div class="col-lg-6 col-md-8 login-box">
			<div class="col-lg-12 login-key">
                    <!-- <img src="../assets/image/logo.png" alt=""> -->
                    <!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                </div>
                <div class="col-lg-12 login-title">
                    <span><i style = "font-family:shrikhand;font-size: 100px;background: -webkit-linear-gradient(#27EF9F, #0DB8DE); -webkit-background-clip: text;-webkit-text-fill-color: transparent;">AMS</i> </span>
                    <span><i style = "margin-left:-20px; font-size:20px;background: -webkit-linear-gradient(#27EF9F, #0DB8DE); -webkit-background-clip: text;-webkit-text-fill-color: transparent; ">com</i> </span>   
                    
                </div>

                <div class="col-lg-12 login-form ">
                    <div class="col-lg-12 login-form">
                        <form method="POST" id = "login-frm" >
                            <div class="form-group">
                                <label class="form-control-label" style = "font-size:13px;">USERNAME</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style = "font-size:13px;">PASSWORD</label>
                                <input type="password" class="form-control" name ="password" >
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-7 login-btm login-button">
                                    <button type="submit" name = "loginBtn" class="btn btn-outline-primary rounded-pill">LOGIN<i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
	</div>

	<!-- mao ni siya original -->
		<!-- <div id ="main" class="bg-info">
		<div class = "container" >
			<div class = "col-lg-12">
			<div class = "row">
				<div class = "col-md-6 offset-md-3 ">
					<div class = "card login-field">
						<div class = "card-header">
							<h4>Login</h4>
						</div>
						<div class = "card-body">
							<form id = "login-frm">
								<div id = "" class = "form-group">
									<label class = "control-label" >Username:</label>
									<input type = "text" name = "username" class = "form-control" required/>
								</div>
								<div id = "" class = "form-group">
									<label class = "control-label">Password:</label>
									<input type = "password" maxlength = "20" name = "password" class = "form-control" required/>
								</div>
								<br />
								<button type = "submit" class = "btn btn-primary btn-block" >Login <i class="fa fa-arrow-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div> -->


	</body>
	<script src = "../assets/js/jquery.js"></script>
	<script src = "../assets/js/bootstrap.js"></script>

	<script>
		// $(document).ready(function(){
		// 	$('#login-frm').submit(function(e){
				
		// 		e.preventDefault();
		// 		$.ajax({
		// 			url:'login.php',
		// 			method:'POST',
		// 			data:$(this).serialize(),
		// 			error:err=>{
		// 				console.log(err)
		// 			},
		// 			success:function(resp){
		// 				if(resp== true){
		// 					location.replace('home.php')
		// 				}
		// 			}
		// 		})
		// 	})
		// })
	</script>
</html>