<!DOCTYPE html>
<?php
	require_once 'auth.php';
	
?>
<html lang="eng">
	<head>
		<title>Employee List | Employee Attendance Record System</title>
		<?php include 'header.php' ?>
	</head>
	
<body>
	<?php include 'nav_bar.php' ?>


	<main> 
        <div class="container-fluid admin" >
            <div class="alert alert-primary">Consolidated Salary</div>
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
            <!-- <div class="well col-lg-12">
                <button class="btn btn-success" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> Add new </button>
                <br />
                <br /> -->
				
                <table id="table" class="table table-bordered table-striped">
					
                    <thead>
                        <tr>
                            <th>Employee No.</th>
                            <th>Date</th>
                            <th>No. of Working Hours</th>
                            <th>Status</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $employee_qry= mysqli_query($conn,"SELECT * FROM `salary`");
                            while($row=$employee_qry->fetch_array()){
                        ?>
                        <tr>
                            <td><?php echo $row['employee_no']?></td>
                            <td><?php echo $row['employee_no']?></td>
                            <td><?php echo $row['work_hours']?></td>
                            <td><?php echo $row['status']?></td>
                            <td><?php echo $row['Salary']?></td>
                            <!-- <td>
                                <center>
								<div style="display:flex;">
									<button class="btn btn-sm btn-outline-primary edit_employee" data-id="<?php echo $row['employee_no']?>" type="button"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-outline-danger remove_employee" data-id="<?php echo $row['employee_no']?>" type="button"><i class="fa fa-trash"></i></button>
								</div>
							</center>
                            </td> -->
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
    </main>
</body>
	<script>

        $(document).ready(function(){
			$('#table').DataTable();
		});
    </script>
</html>