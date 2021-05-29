<!DOCTYPE html>
<?php
include 'auth.php';


  
?>
<html lang = "eng">
	<head>
		<title>Dashboard</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<?php include 'nav_bar.php' ?>
		
			
			
			<main>
        <div class="cards" style = "margin-left:100px;">
            <div class="card-single">
                <div>
                    <h1>
                        <?php 
                           $count = $conn->query("SELECT COUNT(*) as total FROM employee");
                           $fetch = mysqli_fetch_array($count);
                           echo $fetch['total'];
                        
                        ?>
                    </h1>
                    <span>Employees</span>
                </div>
                <div>
                    <span class="fas fa-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>
                        <?php 
                           $count = $conn->query("SELECT COUNT(*) as total FROM projects");
                           $fetch = mysqli_fetch_array($count);
                           echo $fetch['total'];
                        
                        ?>
                    </h1>
                    <span>Projects</span>
                </div>
                <div>
                    <span class="fas fa-clipboard-list"></span>
                </div>
            </div>
    
        </div>

        <div class="container">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h2>Recent Projects</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Project Title</td>
                                        <td>Department</td>
                                        <td>Status</td>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                   $get_project=$conn->query("SELECT * FROM `projects`");	
                                    while ($row = $get_project->fetch_array()){
                                ?>
                                    <tr>
                                        <td><?php echo $row['project_title']?></td>
                                        <td><?php echo $row['department']?></td>
                                        <td>
                                            <?php if($row['status'] == "complete"){ ?>
                                                <span 
                                                 class="status purple">
                                                </span>
                                            <?php echo $row['status']; 
                                            } elseif ($row['status'] == "in progress") {?>
                                               <span 
                                                 class="status pink">
                                                </span>
                                            <?php echo $row['status']; }
                                            else{?>
                                                <span 
                                                 class="status orange">
                                                </span>
                                            <?php echo $row['status'];}?>
                                                
                                            
                                        </td>
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
	
	
</html>