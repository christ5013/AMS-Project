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
		  	<img src="../assets/image/logo.png" alt="logo" style = "margin-left:-40px;" width = "100vmax" height = "70vmax"><span>eTech</span>
			</h1>
        </div>
        
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="user_home.php" class="active">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="records.php">
                <span class="fas fa-clipboard" ></span>
                <span>Records</span>
              </a>
            </li>
			<li>
              <a href="../admin/logout.php">
                <span class="fas fa-sign-out-alt"></span>
                <span>LogOut</span>
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
				<img src="../assets/image/user_icon.png" width="40px" height="40px" alt="profile-img">
				<div class="">
					<h4><?php echo $_SESSION['login_employee']; ?></h4>
					<small>Employee</small>
				</div>
			</div>
		</header>