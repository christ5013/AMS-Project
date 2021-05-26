<!-- <nav class = "navbar navbar-header navbar-dark bg-light">
<div class = "container-fluid">
	<div class = "navbar-header">
			<p class = "navbar-text pull-right text-dark">Company Name</p>
	</div>
	<div class = "nav navbar-nav navbar-right">
		<a href="logout.php" class="text-dark"><?php echo $user_name ?> <i class="fa fa-power-off"></i></a>
	</div>
</div>
</nav>
<div id="sidebar" class="bg-dark">
	<div id="sidebar-field">
		<a href="home.php" class="sidebar-item">
				<div class="sidebar-icon"><i class="fa fa-dashboard"> </i></div>  Dashboard
		</a>
	</div>
	<div id="sidebar-field">
		<a href="employee.php" class="sidebar-item">
				<div class="sidebar-icon"><i class="fa fa-columns"> </i></div>  Employee
		</a>
	</div>
	<div id="sidebar-field">
		<a href="attendance.php" class="sidebar-item">
				<div class="sidebar-icon"><i class="fa fa-list"> </i></div>  Attendance
		</a>
	</div>
	<div id="sidebar-field">
		<a href="users.php" class="sidebar-item">
				<div class="sidebar-icon"><i class="fa fa-users"> </i></div>  Users
		</a>
	</div>

</div>
		<script>
			$(document).ready(function(){
				var loc = window.location.href;
				loc.split('{/}')
				$('#sidebar a').each(function(){
				// console.log(loc.substr(loc.lastIndexOf("/") + 1),$(this).attr('href'))
					if($(this).attr('href') == loc.substr(loc.lastIndexOf("/") + 1)){
						$(this).addClass('active')
					}
				})
			})
			
		</script> -->

<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
	<div class="sidebar-brand">
            <h1> 
                <img src="../assets/image/logo.png" alt="logo" style = "margin-left:-40px;" width = "100vmax" height = "70vmax"><span><i style = "font-family:shrikhand;background: -webkit-linear-gradient(#27EF9F, #0DB8DE);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">AMS</i><span><i style = "font-size:15px; background: -webkit-linear-gradient(#27EF9F, #0DB8DE);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">com</i></span> </span>
            </h1>
        </div>
        
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="home.php" class="active">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="employee_list.php">
                <span class="fas fa-users" ></span>
                <span>List of Employees</span>
              </a>
            </li>
            <li>
              <a href="employee.php">
                <span class="fas fa-plus"></span>
              <span>Add Employee</span>
              </a>
            </li>
            <li>
              <a href="attendance.php">
                <span class="fas fa-tasks"></span>
                <span>Attendance</span>
              </a>
            </li>
			<li>
              <a href="salary.php">
                <span class="fas fa-money-check-alt"></span>
                <span>Salary</span>
              </a>
            </li>
			<li>
              <a href="users.php">
                <span class="fas fa-user-circle"></span>
                <span>Users</span>
              </a>
			</li>
			<li>
              <a href="logout.php">
                <span class="fas fa-sign-out-alt"></span>
                <span>Log Out</span>
              </a>
            </li>
          </ul>

        </div>
		
    </div>    

    <div class="main-content">
		<header>
			<h2>
			<label for="nav-toggle">
				<span class="fas fa-bars"></span>
			</label>
			Dashboard
			</h2>

			<div class="search-wrapper">
				<span class="fas fa-search"> </span>
				<input type="search" placeholder="Search..." />

			</div>

			<div class="user-wrapper">
				<img src="../assets/image/admin-icon.png" width="40px" height="40px" alt="profile-img">
				<div class="">
					<h4><?php echo $_SESSION['login_id']; ?></h4>
					<small>Admin</small>
				</div>
			</div>
		</header>