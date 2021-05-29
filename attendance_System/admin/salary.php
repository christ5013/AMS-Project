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
				
                <table id="table" class="table table-bordered table-striped">
					
                    <thead>
                        <tr>
                            <th>Employee No.</th>
                            <th>Resquest for overtime</th>
                            <th>number of days</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $attendance = mysqli_query($conn,"SELECT DISTINCT employee_no FROM attendance");
                            $temp=0;
                            while($row=$attendance->fetch_array()){
                                $employee_no = $row['employee_no'];
               ?>
                        <tr>
                          <td><?php echo $row['employee_no']?></td>
                         <td><?php echo "null"?></td>
                             <td><?php 
                                $count=0;
                                $sql = "SELECT count(*) as count from attendance where employee_no ='$employee_no' and log_type=1";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $count =$row['count'];
                                    echo $count;
                                  ?></td>
								</div>
							<td><?php echo $count*910?></td>
                            
                        <?php
                             }
                            }
                        ?>
                      
                    </tbody>
                    <?php } ?>
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