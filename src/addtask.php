<!DOCTYPE html>
<?php
include 'koneksi.php';

$querykat = "SELECT * FROM kategori";
$result = mysql_query($querykat);
$option = "" ;
while ($row = mysql_fetch_array($result)) {
    $option = $option . "<option value='" . $row['idkat'] . "'>". $row['namakat'] ."</option>";
}
?>


<html>
    <head>
        <link href='../css/desktop_style.css' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <script type="text/javascript" src="../js/edit_task.js"></script> 
        <script type="text/javascript" src="../js/animation.js"></script> 
        <script type="text/javascript" src="../js/ajax.js"></script> 
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >		
        <title> Eurilys </title>

        <script language="javascript">
            function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rowCount = table.rows.length;

                    for (var i = 0; i < rowCount; i++) {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null != chkbox && true == chkbox.checked) {
                            if (rowCount <= 1) {
                                alert("Cannot delete all the rows.");
                                break;
                            }
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                        }


                    }
                } catch (e) {
                    alert(e);
                }
            }
        </script>
    </head>

    <body>
        <!-- Web Header -->
        <header>
            <div id="header_container"> 
                <div class="left">
                    <a href="dashboard.html"> <img src="../img/logo.png" alt="logo"> </a>
                </div>
                <input id="search_box" type="text" placeholder="search...">
                <div class="header_menu"> 
                    <div class="header_menu_button current_header_menu"> <a href="dashboard.html"> DASHBOARD </a>  </div>
                    <div class="header_menu_button">  <a href="profile.html"> PROFILE </a> </div>
                    <div class="header_menu_button"> <a id="logout" href="../index.php"> LOGOUT </a> </div>
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
                        Ruth Natasha 
                        <br><br>
                        <div class="link_tosca" id="edit_profile_button"> Edit Profile </div>
                    </div>
                </div>
                <div id="category_list">
                    <div class="link_blue_rect" id="category_title"><a href="#" onclick="catchange(0)">All Categories </a> </div>
                    <ul id="category_item">
                        <li><a href="Dashboard.html" onclick="catchange(1)" id="kuliah">Kuliah</a></li>
                        <li><a href="Dashboard.html" onclick="catchange(2)" id="proyek">Proyek</a></li>
                        <li><a href="Dashboard.html" onclick="catchange(3)" id="tugas">Tugas</a></li>
                        <li><a href="Dashboard.html" onclick="catchange(4)" id="lomba">Lomba</a></li>
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
                <div id="add_task_container">
                    <div id="add_task_header" class="left top30 dynamic_content_head">
                        Add New Task
                    </div>
                    <form id="addtask_form" method="post" action="addtask_add.php" enctype="multipart/form-data">
                        <div id="row1_addtask" class="left top30 dynamic_content_row">
                            <div id="task_name_lat" class="left dynamic_content_left">Task Name</div>
                            <div id="task_name_rat" class="left dynamic_content_right">
                                <input id="task_name_input" onkeydown="javascript:checkTaskName();" type="text" name="task_name_input" class="left">
                                <img src="../img/yes.png" id="taskname_validation" class="left signup_form_validation" alt="validation image"/>
                            </div>
                        </div>

                        <div id="row2_addtask" class="left top10 dynamic_content_row">
                            <div id="deadline_lat" class="left dynamic_content_left">Deadline</div>
                            <div id="deadline_rat" class="left dynamic_content_right">
                                <input id="deadline_input" type="date" name="deadline_input">
                            </div>
                        </div>

                        <div id="row3_addtask" class="left top10 dynamic_content_row">
                            <div id="assignee_lat" class="left dynamic_content_left">Assignee</div>
                            <div id="assignee_rat" class="left dynamic_content_right">
                                <TABLE id="dataTable" width="290px" border="0.5">
                                    <TR>
                                        <TD><INPUT type="checkbox" name="chk"/></TD>
                                        <TD>
                                            <input type="text" name="assignee[]" autocomplete="off" list="listassignee" onkeydown="javascript:getSuggest();">
                                            <datalist id="listassignee">
                                            </datalist>
                                        </TD>
                                    </TR>
                                </TABLE> 
                            </div>
                        </div>

                        <div id="row4_addtask" class="left top10 dynamic_content_row">
                            <div id="tag_lat" class="left dynamic_content_left">Tag</div>
                            <div id="tag_rat" class="left dynamic_content_right">
                                <input type="text" id="tag_input" name="tag_input">

                            </div>
                        </div>

                        <div id="row5_addtask" class="left top10 dynamic_content_row">
                            <div id="attachment_lat" class="left dynamic_content_left">Attachment</div>
                            <div id="attachment_rat" class="left dynamic_content_right">
                                <input type="file" id="at_upload" onchange="javascript:checkTaskAttachment();" name="at_upload"/>
                                <img src="../img/yes.png" id="task_attachment_validation" class="left signup_form_validation" alt="validation image"/>
                            </div>
                        </div>

                        <div id="row6_addtask" class="left top10 dynamic_content_row">
                            <div id="attachment_lat" class="left dynamic_content_left">Category</div>
                            <div id="attachment_rat" class="left dynamic_content_right">
                                <select name="select_task_kat">
                                    <?php
                                        echo $option;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="row7_addtask" class="left top10 dynamic_content_row">
                            <input id="add_task_button" type="submit" value="Add Task" class="link_blue_rect">
                            <input id="more_assignee_button" type="button" value="Add Assignee" class="link_blue_rect" onclick="addRow('dataTable')"/>
                            <input id="del_assignee_button" type="button" value="Remove Assignee" class="link_blue_rect" onclick="deleteRow('dataTable')"/>
                        </div>
                    </form>
                </div>

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


