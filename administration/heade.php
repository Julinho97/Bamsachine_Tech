<div class="header">
	<!-- Logo -->
	<div class="header-left">
		<a href="index.php" class="logo">
			<img src="assets/img/logo.png" width="40" height="40" alt="">
		</a>
	</div>
	<!-- /Logo -->
	
	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	<style>
    .page-title-box{
        display: flex;
        align-items: center;
        justify-content: center;
    } .page-title-box h3{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 2vh;
    }.page-title-box h3:hover{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 2vh;
        color:wheat;
        border-bottom: 1vh solid whitesmoke;
    }
    </style>
	<!-- He stader Title -->
	<div class="page-title-box">
		<a href="administration.php"><h3 style="color:wheat;">Bamsachine Tech</h3></a>
       
        <a href="annonces.php"><h3>Annonces</h3></a>
		<a href="utilisateurs.php"><h3>Utilisateurs</h3></a>
		<a href="messages.php"><h3>Messages</h3></a>
		<a href="others.php"><h3>Autres</h3></a>
      

	</div>
    
			
	<!-- /Header Title -->
	
	<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
	
	<!-- Header Menu -->
	<ul class="nav user-menu">
	
		<!-- Search -->
		<li class="nav-item">
			<div class="top-nav-search">
				<a href="javascript:void(0);" class="responsive-search">
					<i class="fa fa-search"></i>
				</a>
				<form action="search.php">
					<input class="form-control" type="text" placeholder="Search here">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</li>
		<!-- /Search -->
	
		
	
		<!-- Notifications -->
		<li class="nav-item dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Notifications</span>
					<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
				</div>
				<div class="noti-content">
					<ul class="notification-list">
						
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="activities.php">View all Notifications</a>
				</div>
			</div>
		</li>
		<!-- /Notifications -->
		
		<!-- Message Notifications -->
		<li class="nav-item dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Messages</span>
					<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
				</div>
				<div class="noti-content">
					<ul class="notification-list">
						
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="chat.php">View all Messages</a>
				</div>
			</div>
		</li>
		<!-- /Message Notifications -->

		<?php 
		$sql = "SELECT * from administration";
		$query = $pdo -> prepare($sql);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;
		?>

		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img src="./assets/img/profiles/avatar-1.jpg" alt="User Picture">
				<span class="status online"></span></span>
                				<?php
                                if (isset($_SESSION['num']) AND $adminInfo['id_admin'] == $_SESSION['num']){                                    
                                ?>
				<span><?php echo $username;?></span>

            <?php
				}
			?>

			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="profil.php">Settings</a>
				<a class="dropdown-item" href="deconnexion.php">Logout</a>
			</div>
		</li>
	</ul>
	<!-- /Header Menu -->
	
	<!-- Mobile Menu -->
	<div class="dropdown mobile-user-menu">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item" href="settings.php">Settings</a>
			<a class="dropdown-item" href="deconnexion.php">Logout</a>
		</div>
	</div>
	<!-- /Mobile Menu -->
	
</div>