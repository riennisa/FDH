<?php
	include "koneksi.php";
	if (($_COOKIE['username'] == '') && ($_COOKIE['password'] == '')) {
		header('Location:../index.php') ; 
	}
	
	$curr_username = $_COOKIE['username'];
	$sql_id = mysql_query("SELECT id FROM user WHERE username LIKE '".$curr_username."'");
	$loginid = mysql_fetch_array($sql_id);
	$result = mysql_query("SELECT * FROM user WHERE id=".$loginid['id']);
	$login = mysql_fetch_array($result);
		
?>
<!DOCTYPE html>
<html>
	<head>
		<link href='../css/desktop_style.css' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="../js/search.js"></script> 
		<script type="text/javascript" src="../js/edit_task.js"> </script> 
		<script type="text/javascript" src="../js/animation.js"> </script> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >		
		<title> Eurilys </title>
	</head>
	<?php
		include 'koneksi.php';
		$id = $_GET['id'];
		$uid = $_COOKIE['username'];
	?>
	
	<body>
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
					<a href="dashboard.php"><div class="header_menu_button"> DASHBOARD </div></a>
					<?php
						echo "<a href='profile.php?user=".$curr_username."'>";
					?>
					<div class="header_menu_button current_header_menu">
						<?php echo "<img id='header_img' src='../img/".$login['avatar']."'>";?>
						<div id="header_profile">
							&nbsp;&nbsp;<?php echo $login['username'];?>
						</div>
					</div>
					</a>
					<a id="logout" href="logout.php"><div class="header_menu_button"> LOGOUT </div></a>
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
						Ruth Nattassha 
						<br><br>
						<div class="link_tosca" id="edit_profile_button"> Edit Profile </div>
					</div>
				</div>
				
			</div>
			<form>
			<div id="dynamic_content">
				<div id="edit_task_header" class="left top30 dynamic_content_head">
				<?php
				$tugas="select * from tugas where id=$id";
				$hasil=mysql_query($tugas);
				while($row=mysql_fetch_array($hasil)){
				$idtask=$row['id'];
				$a = 1;
				?>
					<?php echo $row['namatask']; ?>
				</div>
				
				
				
				<?php echo "<input id=\"edit_task_button\" class=\"left top30 link_blue_rect\" 
					onclick=\"edit_task(".$row['id'].")\" type=\"button\" value=\"Edit Task\">"; ?>
				
				<?php echo "<input id=\"save_button_td\" class=\"left top30 link_blue_rect\" 
					onclick=\"save_edit_task(".$row['id'].")\" type=\"button\" value=\"Save\">"; ?>
				
				
				<div id="row1_taskdetail" class="left top30 dynamic_content_row">
					<div id="task_name_ltd" class="left dynamic_content_left">Nama Tugas</div>
					<div id="task_name_rtd" class="left dynamic_content_right"> <?php echo $row['namatask']; ?></div>
				</div>
				
				<div id="row2_taskdetail" class="left top10 dynamic_content_row">
					<div class="left dynamic_content_left">Status</div>
					<?php echo "<div id=\"status".$a."\" class=\"left dynamic_content_right\">"; ?>
					<?php if ($row['status'] == 1)
					{
						echo "Selesai";
					}
					else
					{
						echo "Belum Selesai";
					} ?>
					</div>
					<?php echo "<input id=\"edit_task_button\" class=\"changestat\" onclick=\"changestat(".$idtask.",".$a.")\" type=\"button\" value=\"Ubah\">"; $a++; ?>
					<br><br>
				
				<div id="row3_taskdetail" class="left top10 dynamic_content_row">
					<div id="deadline_ltd" class="left dynamic_content_left">Deadline</div>
					<div id="deadline_rtd" class="left dynamic_content_right">
					<?php 
					echo $row['deadline']; 
					?></div>
				</div>
				<div id="row4_taskdetail" class="left top10 dynamic_content_row">
					<div id="assignee_ltd" class="left dynamic_content_left">Assignee</div>
					<div id="assignee_rtd" class="left dynamic_content_right">
					
<div id="inputass">
<?php
					$assignee="select * from assignee where idtask= '$idtask'";
$hasilassignee=mysql_query($assignee);
while($rowassignee=mysql_fetch_array($hasilassignee)){

echo "<a href=\"profil.php?id=".$rowassignee['id']." \">".$rowassignee['nama_user']."</a>";
echo "<br>";
}
?>
<div id="edit_ass" style="display:none"> <form> <table>  <tr> <input type="text" id="assignee" value="" ></input></td></tr><tr><td><?php echo "<input id=\"tambah_button\" type=\"button\" onclick=\"addRows(".$id.")\" value=\"Tambah\" />" ?>  </td>    </tr>   </table></form>
					</div>
<div id="delete_ass" style="display:none"> <?php
					echo "<form action=\"\"> <select id=\"assignees\" onchange=\"delAss(this.value, ".$id.")\"> <option value=\"\">Delete an assignee:</option>";
$assignee = array();
$x="select * from assignee where idtask= '$idtask'";
$hasilx=mysql_query($x);
while(($row =  mysql_fetch_assoc($hasilx))) {
    $assignee[] = $row['nama_user'];
}
foreach ($assignee as $opt) {
    $sel = '';
    if (in_array($opt, $mytitle)) {
        $sel = ' selected="selected" ';
    }
    echo '<option ' . $sel . ' value="' . $opt . '">' . $opt . '</option>';
}
echo "</select></form>";
?>
</div>
					</div>
					
					</div>
					
				</div>
				<div id="row5_taskdetail" class="left top10 dynamic_content_row">
					<div id="tag_ltd" class="left dynamic_content_left">Tag</div>
					<div id="tag_rtd" class="left dynamic_content_right"> 
					
					<?php
					$tag="select * from tag where idtask= '$idtask'";
					$hasiltag=mysql_query($tag);
					while($rowtag=mysql_fetch_array($hasiltag)){

					echo "".$rowtag['namatag']." ";
					echo " | ";
					}
					?>
					<div id="edit_tag" style="display:none"> <input type="text" id="tag_input"><?php echo "<input id=\"tag_button\" type=\"button\" onclick=\"editTag(".$id.")\" value=\"Save Tag\" />"; ?>
					</div>

					</div>
				</div>
				</form>
				<div id="row6_taskdetail" class="left top10 dynamic_content_row">
					<div id="comment_ltd" class="left dynamic_content_left">Komentar</div>
					<div id="comment_rtd" class="left dynamic_content_right">
					<?php
					$jumlah ="SELECT COUNT(id) as jumlah FROM komentar where idtask='$idtask'";
					$resultjml = mysql_query($jumlah);
$rowjml = mysql_fetch_assoc($resultjml);
echo "Jumlah Komentar : ".$rowjml['jumlah']." <br> ";

					?>
					<?php
					// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM komentar";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 3;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$sql = "select *, user.id as uid from komentar,user where idtask= '$idtask' and user.id=komentar.iduser order by waktu DESC LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);

// while there are rows to be fetched...
while ($list = mysql_fetch_assoc($result)) {
   // echo data
   echo "<img width=\"30\" height=\"30\" src=\"upload/".$list['avatar']."\"></img> (".$list['waktu'].") : ";
  echo $list['komentar'];
  echo "<br><hr>";
} // end while

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?id=".$idtask."&currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?id=".$idtask."&currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?id=".$idtask."&currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?id=".$idtask."&currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?id=".$idtask."&currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/
?>
					</div>
				</div>
				
				<div id="row7_taskdetail" class="left top10 dynamic_content_row">
					<div id="addcomment_ltd" class="left dynamic_content_left">Add Comment</div>
					<div id="addcomment_rtd" class="left dynamic_content_right">
						<?php 
echo "<div id=\"result\" style=\"display:none;\"></div>
<form>
   <table>
        <tr>
			<textarea id=\"komentar\" rows=\"4\" cols=\"50\" ></textarea>
        </td>
        </tr>
        
        <tr>
            <td>
                <input type=\"button\" onclick=\"add_comment(".$idtask.",".$loginid['id'].")\" value=\"Submit\" />
                <input type=\"reset\" value=\"Reset\" />
            </td>
        </tr>
    </table>
</form>";?>
					</div>
				</div>
				<?php
				}
				?>
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
</html>