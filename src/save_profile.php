<?php include 'connect.php'?>
<?php
	$q = $_GET["q"];
	
	$valid = strtok($q, '|');
	$id = strtok('|');
	$fullname = strtok('|');
	$email = strtok('|');
	$birthdate = strtok('|');
	
	if ($valid != 0) {
		mysqli_query($conn, "UPDATE user SET fullname = '".$fullname."', email = '".$email."', 
			birthdate = '".$birthdate."' WHERE id = " . $id);
	}
	
	$curr_username = $_COOKIE['username'];
	$sql_id = mysqli_query($conn, "SELECT id FROM user WHERE username LIKE '".$curr_username."'");
	$loginid = mysqli_fetch_array($sql_id);
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE id=".$loginid['id']);
	$login = mysqli_fetch_array($result);
	
	echo "<div id='upperprof'>
		<img src='../img/avatar1.png' alt=''>
		<div id='namauser'>
			" . $login['fullname'] . "
		</div>
	</div>
	<div id='bio'>
		<span id='left'>
		<b>Username</b>
		<br/>
		<b>Email</b>
		<br/>
		<b>Birthdate</b>
		<br/>
		<button class='link_tosca' id='edit_profile_button' onclick='edit_profile()'> Edit Profile </button>
		</span>
		<span id='right'>
			: " . $login['username'] . "
			<br/>
			: " . $login['email'] . "
			<br/>
			: " . $login['birthdate'] . "
			<br/>
		</span>
	</div>
	<div id='change_pass'>
		<span id='left'>
			<span id='change_password'>
				<button class='link_tosca' id='change_pass_button' onclick='change_pass()'> Change Password </button>
			</span>
		</span>
		<span id='right'>
			<span id='form_change_password'>
			</span>
		</span>
	</div>
	<div id="change_avatar">
		<span id="left">
			Avatar;
		</span>
		<span id="right">
			<input type='file' id='avatar' name='avatar' accept=image/*>
		</span>
	</div>";
?>