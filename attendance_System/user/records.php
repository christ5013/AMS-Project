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
                            <table class = "table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <td>Employee No.</td>
                                        <td>Date</td>
                                        <td>Time In</td>
                                        <td>Time Out</td>
                                        
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Website</td>
                                        <td>Frontend</td>
                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Website</td>
                                        <td>Frontend</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Website</td>
                                        <td>Frontend</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Website</td>
                                        <td>Frontend</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Website</td>
                                        <td>Frontend</td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div clas = "totalSalary">
                                <h4 style = "float:right;">Total: 
                                <input type="text" class = "form-control rounded w-50 bg-info" style = "float:right; margin-right:50%;"></h4></th> 
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    </body>
    </html>