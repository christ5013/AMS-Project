<!DOCTYPE html>
<?php
	require_once 'auth.php';
	
?>
<html lang="eng">
	<head>
		<title>Employee List | Employee Attendance Record System</title>
		<?php include('header.php') ?>
	</head>
	
	<body>
		<?php include('nav_bar.php') ?>


		<main> 
        <div class="container-fluid admin" >
            <div class="alert alert-primary">Employee List</div>
            <!-- <div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content panel-warning">
                        <div class="modal-header panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModallabel">Edit Student</h4>
                        </div>
                        <div id="edit_query"></div>
                    </div>
                </div>
            </div> -->
            <div class="well col-lg-12">
                <button class="btn btn-success" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> Add new </button>
                <br />
                <br />
				
                <table id="table" class="table table-bordered table-striped">
					
                    <thead>
                        <tr>
                            <th>Employee No</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $employee_qry= mysqli_query($conn,"SELECT * FROM `employee`");
                            while($row=$employee_qry->fetch_array()){
                        ?>
                        <tr>
                            <td><?php echo $row['employee_no']?></td>
                            <td><?php echo $row['firstname']?></td>
                            <td><?php echo $row['middlename']?></td>
                            <td><?php echo $row['lastname']?></td>
                            <td><?php echo $row['department']?></td>
                            <td><?php echo $row['position']?></td>
                            <td>
                                <center>
								<div style="display:flex;">
									<button class="btn btn-sm btn-outline-primary edit_employee" data-id="<?php echo $row['employee_no']?>" type="button"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-outline-danger remove_employee" data-id="<?php echo $row['employee_no']?>" type="button"><i class="fa fa-trash"></i></button>
								</div>
							</center>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <br />
            <br />  
            <br />  
        </div>
        <div class="modal fade" id="new_employee" tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style = "background:linear-gradient(to bottom, #33cccc 0%, #336699 100%);">
                            
                            <h4 class="modal-title" id="myModallabel">Add new Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form class = "rounded" id='employee_frm' style = "background-color:beige;">
                            <div class ="modal-body">
                                <div class="form-group">
                                    <label>Firstname:</label>
                                    <input type="hidden" name="id" />
                                    <input type="text" name="firstname" required="required"  class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;" />
                                </div>
                                <div class="form-group">
                                    <label>Middlename:</label>
                                    <input type="text" name ="middlename" placeholder="(optional)"  class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;"/>
                                </div>
                                <div class="form-group">
                                    <label>Lastname:</label>
                                    <input type="text" name="lastname" required="required"  class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;"/>
                                </div>
                                <div class="form-group">
                                    <label>Department:</label>
                                    <input type="text" name="department" required="required"  class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;"/>
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" name="position" required="required" class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;"/>
                                </div>
								<div class="form-group">
                                    <label>Access</label>
                                    <input type="text" name="access" required="required" class="form-control rounded bg-white text-dark" style = "border-top: 1px solid gray; border-right: 1px solid gray; border-left: 1px solid gray;"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	</body>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#employee_frm').submit(function(e){
				e.preventDefault()
				$('#employee_frm [name="submit"]').attr('disabled',true)
				$('#employee_frm [name="submit"]').html('Saving')
				$.ajax({
					url:'save_employee.php',
					method:"POST",
					data:$(this).serialize(),
					error:err=>console.log(),
					success:function(resp){
						if(typeof resp !=undefined){
							console.log(resp);
							resp = JSON.parse(resp);
							
							if(resp.status == 1){
								Swal.fire({	
									icon: 'success',
									title: resp.msg,	
									showConfirmButton: false,
									timer: 2000
										
								})
								$('#new_employee').modal('hide')
								setTimeout(function(){location.reload()}, 2000);
								
							}
						}
					}
				})
			})

			$('.remove_employee').click(function(){
				var id=$(this).attr('data-id');
				console.log(id);
				var _conf = confirm("Are you sure to delete this data ?");
				if(_conf == true){
					console.log("here");
					$.ajax({
						url:'delete_employee.php?employee_no='+id,
						error:err=>console.log(err),
						success:function(resp){
							if(typeof resp != undefined){
								resp = JSON.parse(resp)
								if(resp.status == 1){
									// alert(resp.msg);
									// location.reload()
									Swal.fire({	
									icon: 'success',
									title: resp.msg,	
									showConfirmButton: false,
									timer: 1000
										
									})
									setTimeout(function(){location.reload()}, 2000);
								}
							}
						}
					})
				}
			});
			$('.edit_employee').click(function(){
				var $id=$(this).attr('data-id');
				console.log($id);
				$.ajax({
					url:'get_employee.php',
					method:"POST",
					data:{id:$id},
					error:err=>console.log(),
					success:function(resp){
						if(typeof resp !=undefined){
							resp = JSON.parse(resp)			
							$('[name="id"]').val(resp.employee_no)
							$('[name="firstname"]').val(resp.firstname)
							$('[name="lastname"]').val(resp.lastname)
							$('[name="middlename"]').val(resp.middlename)
							$('[name="department"]').val(resp.department)
							$('[name="position"]').val(resp.position)
							$('[name ="access"]').val(resp.access)
							$('#new_employee .modal-title').html('Edit Employee')
							$('#new_employee').modal('show')
						}
					}
				})
				
			});
			$('#new_emp_btn').click(function(){
				$('[name="id"]').val('')
				$('[name="firstname"]').val('')
				$('[name="lastname"]').val('')
				$('[name="middlename"]').val('')
				$('[name="department"]').val('')
				$('[name="position"]').val('')
				$('[name="access"]').val('')
				$('#new_employee .modal-title').html('Add New Employee')
				$('#new_employee').modal('show')
			})
		});
	</script>
</html>
