<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../js/edit_task.js"> </script> 
        <script type="text/javascript" src="../js/animation.js"></script> 
		<script>
		window.onunload = function(){
  window.opener.location.reload();
};
		</script>
		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >		
		<title> Eurilys </title>
	</head>
	<?php
include "koneksi.php";

$namakat=$_POST['namakat'];
$assignee=$_POST['assignee'];

$simpan = mysql_query("insert into kategori (namakat)
values ('$namakat')");
if ($simpan){

echo "<script>alert('Berhasil'); history.go(-1); window.close();  </script>";

} else {
echo "<script>alert('Gagal'); history.go(-1)</script>";
}
?>
</html>