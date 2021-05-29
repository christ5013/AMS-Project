<!DOCTYPE html>
<?php

include_once ('../admin/db_connect.php');

	session_start();
    if (!isset($_SESSION['login_employee'])) {
		header("location:/AMS-Project/attendance_System/admin/index.php");
    }else{
        
   
    }

?>
<html lang = "eng">
	<head>
		<title>Simple Employee Attendance Record System</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<?php include 'nav_bar.php' ?>
		
			
			<!-- <div class = "alert alert-primary">Dashboard</div> -->
			<!-- <h5>Welcome <?php echo ucwords($user_name) ?> !</h5> -->
			<main>
        <div class="cards" style = "margin-left:100px;">
            <div class="card-single">
                <div>
                    <h1> <?php 
                           $count = $conn->query("SELECT COUNT(*) as total FROM employee");
                           $fetch = mysqli_fetch_array($count);
                           echo $fetch['total'];
                        
                        ?></h1>
                    <span>Employees</span>
                </div>
                <div>
                    <span class="fas fa-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1> <?php 
                           $count = $conn->query("SELECT COUNT(*) as total FROM projects");
                           $fetch = mysqli_fetch_array($count);
                           echo $fetch['total'];
                        
                        ?></h1>
                    <span>Projects</span>
                </div>
                <div>
                    <span class="fas fa-clipboard-list"></span>
                </div>
            </div>
        </div>
		<div class="twoGrid m-5 p-3" >
            <div class="grid-single m-5">
                <div class="card-body">
                    <div class="text-center">
                        <h4><?php echo date('F d,Y') ?> <span id="now"></span></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center mb-4" id="log_display"></div>
                            <form action="" id="att-log-frm" >
                                <div class="form-group">
                                    <label for="eno" class="control-label">Enter your Employee Number:</label>
                                    <input type="text" readonly id="eno" name="eno" class="form-control bg-white text-dark rounded" value="<?php echo $_SESSION['login_employee']?>" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray; width:300px;" >
                                </div>
                                <center>
                                    <button type="button" class='btn btn-sm btn-primary log_now col-sm-4' data-id="1">TIME IN</button>
                                    <button type="button" class='btn btn-sm btn-primary log_now col-sm-4' data-id="2">TIME OUT</button>
                                    <!-- <button type="button" class='btn btn-sm btn-primary log_now col-sm-2' data-id="3">IN PM</button>
                                    <button type="button" class='btn btn-sm btn-primary log_now col-sm-2' data-id="4">OUT PM</button> -->
                                </center>
                                <div class="loading" style="display: none"><center>Please wait...</center></div>
                                
                            </form>
                    </div>
                </div>
            </div>     
        </div>
    </main>	
</body>

<script>
		$(document).ready(function(){
			setInterval(function(){
				var time = new Date();
				var now = time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true })
				$('#now').html(now)
			},500)
			console.log()

			$('.log_now').each(function(){
				$(this).click(function(){
					var _this = $(this)
					var eno = $('[name="eno"]').val()
					if(eno == ''){
						alert("Please enter your employee number");
					}else{
						$('.log_now').hide()		
						$('.loading').show()
						$.ajax({
							url:'../admin/time_log.php',
							method:'POST',
							data:{type:_this.attr('data-id'),eno:$('[name="eno"]').val()},
							error:err=>console.log(err),
							success:function(resp){
								if(typeof resp != undefined){
									resp = JSON.parse(resp)

									if(resp.status == 1){
										// $('[name="eno"]').val('')
										$('#log_display').html(resp.msg)
										$('.log_now').show()		
										$('.loading').hide()
										setTimeout(function(){
										$('#log_display').html('')
										},5000)
									}else{
										alert(resp.msg)
										$('.log_now').show()		
										$('.loading').hide()
									}
								}
							}
						})		
					}
				})
			})
		})
	</script>

</html>