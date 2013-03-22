<?php

if (($_COOKIE['username'] == '') && ($_COOKIE['password'] == '')) {
    header('Location:../index.php') ; 
}

?>

<!DOCTYPE html>
<html>
	<!--
	<IFRAME name="iframe" src="src/header.html" width='100%' height='auto' marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=auto></IFRAME>
	-->
	
	<head>
		<link href='../css/desktop_style.css' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
		<script type="text/javascript" src="../js/animation.js"> </script>
		<script type="text/javascript" src="../js/catselector.js"> </script> 		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Eurilys </title>
	</head>
	
	<body>
		<?php include 'connect.php' ?>
		<?php
			$username = $_COOKIE['username'];
			$sql_id = mysqli_query($conn, "SELECT id FROM user WHERE username LIKE '".$username."'");
			$id = mysqli_fetch_array($sql_id);
			
			$result = mysqli_query($conn, "SELECT * FROM user WHERE id=".$id['id']);
			$profile = mysqli_fetch_array($result);
		?>
		<!-- Web Header -->
		<header>
			<div id="header_container"> 
				<div class="left">
					<a href="dashboard.php"> <img src="../img/logo.png" alt=""> </a>
				</div>
				<form id="search_form" action="search_results.php" method="get" class="sb_wrapper">
					<input id="search_box" name="search_query" type="text" placeholder="Search...">
					<button type="submit" id="search_button" value></button>
					<ul class="sb_dropdown">
						<li class="sb_filter">Filter your search</li>
						<li><input type="checkbox"/><label for="all"><strong>Select All</strong></label></li>
						<li><input type="checkbox" name="username" id="username" /><label for="Username">Username</label></li>
						<li><input type="checkbox" name="category" id="category" /><label for="Category">Category</label></li>
						<li><input type="checkbox" name="task" id="task" /><label for="Task">Task</label></li>
					</ul>
				</form>
				<div class="header_menu"> 
					<a href="dashboard.html"><div class="header_menu_button current_header_menu"> DASHBOARD </div></a>
					<?php
						echo "<a href='profile.php?user=".$username."'>";
					?>
					<div class="header_menu_button">
						<img id="header_img" src="../img/avatar1.png">
						<div id="header_profile">
							&nbsp;&nbsp;<?php echo $profile['username'];?>
						</div>
					</div>
					</a>
					<a id="logout" href="../index.php"><div class="header_menu_button"> LOGOUT </div></a>
				</div>
			</div>
			<div class="thin_line"></div>
		</header>
		
		<!-- Web Content -->
		<section>
			<div id="navbar">
				<div id="short_profile">
					<img id="profile_picture" src="../img/avatar1.png" alt="">
					<div id="profile_info">
						<?php echo $profile['username'];?>
					</div>
				</div>
				<div id="category_list">
					<div class="link_blue_rect" id="category_title"><a href="#" onclick="catchange(0)">All Categories </a> </div>
					<ul id="category_item">
						<li><a href="#" onclick="catchange(1)" id="kuliah">Kuliah</a></li>
						<li><a href="#" onclick="catchange(2)" id="proyek">Proyek</a></li>
						<li><a href="#" onclick="catchange(3)" id="tugas">Tugas</a></li>
						<li><a href="#" onclick="catchange(4)" id="lomba">Lomba</a></li>
					</ul>
					<div id="add_task_link"> <a href="addtask.html"> + new task </a> </div>
					<div id="add_new_category" onclick="toggle_visibility('category_form');"> + new category </div>
					<div id="category_form">
						<div id="category_form_inner">
							Category name : <br>
							<input type="text" id="add_category_name" value="">
							<br><br>
							Assignee(s) : <br>
							<input type="text" id="add_category_asignee_name" value="">
							<br><br>
							<div id="add_category_button" class="link_red" onclick="add_category()"> Add </div>
						</div>
					</div>
				</div>
			</div>
			<div id="dynamic_content">
				<br><br>
				<br><br>
				<div class="task_view" id="curtask1">
					<img src="../img/done.png" id="finish_1" onclick="javascript:finishTask(1)" class="task_done_button" alt=""/>
					<div id="task_name_ltd" class="left dynamic_content_left">Task Name</div>
					<div id="task_name_rtd" class="left dynamic_content_right"> <a href="taskdetail_img.html"> Catatan Progin </a> </div>
					<br><br>
					<div id="deadline_ltd" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd" class="left dynamic_content_right">21/2/2012</div>
					<br><br>
					<div id="tag_ltd" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd" class="left dynamic_content_right"> notes, catatan</div>
					<br>
					<div class="task_view_category"> Kuliah </div>
					<br>
				</div>
				
				<div class="task_view" id="curtask2">
					<img src="../img/done.png" id="finish_2" onclick="javascript:finishTask(2)" class="task_done_button" alt=""/>
					<div id="task_name_ltd_2" class="left dynamic_content_left">Task Name</div>
					<div id="task_name_rtd_2" class="left dynamic_content_right"> <a href="taskdetail_file.html"> Tubes Progin I </a> </div>
					<br><br>
					<div id="deadline_ltd_2" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd_2" class="left dynamic_content_right">21/2/2012</div>
					<br><br>
					<div id="tag_ltd_2" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd_2" class="left dynamic_content_right">HTML 5, CSS 3</div>
					<br>
					<div class="task_view_category"> Kuliah </div>
					<br>
				</div>
				<br><br>
				<div class="task_view" id="curtask3">
					<img src="../img/done.png" id="finish_3" onclick="javascript:finishTask(3)" class="task_done_button" alt=""/>
					<div id="task_name_ltd_3" class="left dynamic_content_left">Task Name</div>
					<div id="task_name_rtd_3" class="left dynamic_content_right"> <a href="taskdetail_file.html"> Imagine Cup </a> </div>
					<br><br>
					<div id="deadline_ltd_3" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd_3" class="left dynamic_content_right">21/2/2012</div>
					<br><br>
					<div id="tag_ltd_3" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd_3" class="left dynamic_content_right">HTML 5, CSS 3</div>
					<br>
					<div class="task_view_category"> Lomba </div>
					<br>
				</div>
				<br><br>
				<div class="task_view" id="curtask4">
					<img src="../img/done.png" id="finish_4" onclick="javascript:finishTask(4)" class="task_done_button" alt=""/>
					<div id="task_name_ltd_4" class="left dynamic_content_left">Task Name</div>
					<div id="task_name_rtd_4" class="left dynamic_content_right"> <a href="taskdetail_file.html"> Proyek BNI </a> </div>
					<br><br>
					<div id="deadline_ltd_4" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd_4" class="left dynamic_content_right">21/2/2012</div>
					<br><br>
					<div id="tag_ltd_4" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd_4" class="left dynamic_content_right">HTML 5, CSS 3</div>
					<br>
					<div class="task_view_category"> Proyek </div>
					<br>
				</div>
				<br><br>
				<div class="task_view" id="curtask5">
					<img src="../img/done.png" id="finish_5" onclick="javascript:finishTask(5)" class="task_done_button" alt=""/>
					<div id="task_name_ltd_5" class="left dynamic_content_left">Task Name</div>
					<div id="task_name_rtd_5" class="left dynamic_content_right"> <a href="taskdetail_file.html"> Database Sekolah </a> </div>
					<br><br>
					<div id="deadline_ltd_5" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd_5" class="left dynamic_content_right">21/2/2012</div>
					<br><br>
					<div id="tag_ltd_5" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd_5" class="left dynamic_content_right">HTML 5, CSS 3</div>
					<br>
					<div class="task_view_category"> Proyek </div>
					<br>
				</div>
				<br><br><br><br>				
			</div>
		</section>
		
		<!-- Footer Section -->
		<div class="thin_line"></div>
		<footer>
			<div id="footer_container"> 
				<br><br>
				About &nbsp;&nbsp;&nbsp; FAQ &nbsp;&nbsp;&nbsp; Feedback &nbsp;&nbsp;&nbsp; Terms &nbsp;&nbsp;&nbsp; Privay &nbsp;&nbsp;&nbsp; Copyright 
				<br>
				Eurilys 2013
			</div>
		</footer>
	</body>

<!-- ini nanti jadiin footer -->
</html>