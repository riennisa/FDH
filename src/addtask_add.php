<?php

include 'koneksi.php';

$query = "SHOW TABLE STATUS LIKE 'tugas'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
$newid = $data['Auto_increment'];

$taskname = $_POST['task_name_input'];
$deadline = $_POST['deadline_input'];
$as = $_POST['assignee'];
$tag = $_POST['tag_input'];
$cat = $_POST['idkat'];
$ava = $_FILES["at_upload"]["name"] ;

echo $newid ;
echo $taskname ;
echo $deadline ;
echo $as ;
echo $tag ;
echo $cat ;
echo $ava ;

//Insert data to database
$querytugas = "INSERT INTO `tugas` (`id`,`idkat`,`namatask`,`deadline`,`attachment`) VALUES ('$newid','$cat','$taskname','$deadline','$ava')" ;
if(mysql_query($querytugas)) {
    echo "querydata ok" ;
}

$tagex = explode(',', $tag) ;
echo $tag ;

echo "tag 1" . $tagex[0] ;
echo "tag 2" . $tagex[1] ;

foreach ($tagex as $tagin) {
    $querytag = "INSERT INTO `tag` (`idtask`,`namatag`) VALUES ('$newid','$tagin')" ;
    echo $tagin;
    mysql_query($querytag) ;

}

foreach ($as as $asin){
    $queryas = "INSERT INTO `assignee` (`idtask`,`nama_user`) VALUES ('$newid','$asin')" ;
    echo $asin;
    mysql_query($queryas) ;
}

// Upload File
$allowedExts = array("jpg", "jpeg", "gif", "png");
$temp = (explode(".", $_FILES["at_upload"]["name"]));
$extension = end($temp);
if ($_FILES["at_upload"]["error"] > 0) {
    echo "Return Code: " . $_FILES["at_upload"]["error"] . "<br>";
} else {
    if (file_exists("attachment/" . $_FILES["at_upload"]["name"])) {
        echo $_FILES["at_upload"]["name"] . " already exists. ";
    } else {
        move_uploaded_file($_FILES["at_upload"]["tmp_name"], "attachment/" . $_FILES["at_upload"]["name"]);
        echo "Stored in: " . "attachment/" . $_FILES["at_upload"]["name"];
    }
}

header("Location:dashboard.php") ;
?>
