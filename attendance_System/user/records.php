<!DOCTYPE html>
<?php
	include 'auth.php';
?>
<html lang = "eng">
	<head>
		<title>Simple Employee Attendance Record System</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<?php include 'nav_bar.php' ?>

    <main>
        <div class="container">
            <div class="records">
                <div class="card">
                    <div class="card-header" style = "background:linear-gradient(to right, #33cccc 0%, #336699 100%);text-align:center;">
                        <h2 class = "text-white">My Records</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class = "table table-hover" id="table" width="100%">
                                <thead>
                                <tr>
                                        <!-- <td>Employee No.</td> -->
                                        <td>Date</td>
                                        <td>DateType</td>
                                        <td>Time</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                        $query = mysqli_query($conn,"SELECT * FROM attendance WHERE employee_no = '".$_SESSION['login_employee']."'");
                                        while ($row = $query->fetch_array()){
   
                                    ?>
                                    <tr>
                                      
                                        <td><?php echo date("F d, Y", strtotime($row['datetime_log']))?></td>
                                        <?php 
                                            if($row['log_type'] ==1){
                                                $log = "TIME IN";
                                            }elseif($row['log_type'] ==2){
                                                $log = "TIME OUT";
                                            }
                                          
                                            ?>
                                        <td><?php echo $log ?></td>
                                        <td><?php echo date("h:i a", strtotime($row['datetime_log']))?></td>
                                        
                                        

                                    </tr>
                                    <?php }?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    </body>
    <script>
        $(document).ready(function(){
            $('#table').DataTable();    
        }) 
    </script>
    </html>