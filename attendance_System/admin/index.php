<!DOCTYPE html>
<?php
	session_start();
	if(ISSET($_SESSION['login_id'])){
		header('location: home.php');
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
					<img src="../assets/image/logo.png" alt="">
                	<!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                </div>
                <div class="col-lg-12 login-title">
					<i>𝐞𝐓𝐞𝐜𝐡</i> 
                </div>

                <div class="col-lg-12 login-form ">
                    <div class="col-lg-12 login-form">
                        <form method="POST" id = "login-frm">
						
                            <div class="form-group">
                                <label class="form-control-label" style = "font-size:13px;">USERNAME</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style = "font-size:13px;">PASSWORD</label>
                                <input type="password" class="form-control" id="password" name ="password" i>
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

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>
	<script src = "../assets/js/jquery.js"></script>
	<script src = "../assets/js/bootstrap.js"></script>

	<script>
		$(document).ready(function(){
			$('#login-frm').submit(function(e){
				
				e.preventDefault();
				$.ajax({
					url:'try_login.php',
					method:'POST',
					data:$(this).serialize(),
					error:err=>{
						console.log(err)
					},
					success:function(resp){
						
						if(resp== true){
							location.replace('home.php')
						}else{
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Invalid Username or password!',
								footer: 'Please check your username or password'
							})
							$('#password').val('');
							
						}
					}
				})
			})
		})
	</script>
</html>