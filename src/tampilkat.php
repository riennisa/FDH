<?php  
include "koneksi.php";
$id=$_GET["id"];
$result = mysql_query($sql);
 
echo "<div class=\"link_blue_rect\" id=\"category_title\"><a href=\"#\" onclick=\"catchange(0)\">All Categories </a> </div>
					<ul id=\"category_item\">";
$kategori="select * from kategori";
$hasilkat=mysql_query($kategori);
while($rowkat=mysql_fetch_array($hasilkat)){
$idkat=$rowkat['id'];
echo "<li>
					<a href=\"#\" onclick=\"catchange(1)\" id=\"kuliah\"> ".$rowkat['namakat']."</a>
					<input id=\"kuliah\" onclick=\"deletekat(".$row['id'].")\" type=\"button\" value=\"Delete\"> </li>";
	}
echo "</ul> <div id=\"add_new_category\" onclick=\"window.open('tambahkat.php', 'PopUpAing',  'width=432,height=270,toolbar=0,scrollbars=0,screenX=200,screenY=200,left=200,top=200')\"> TAMBAH KATEGORI </div>";
					
  
?> 