<?php

include 'koneksi.php';

$u = $_GET["u"] ;
$p = $_GET["p"] ;
$rm = $_GET["rm"] ;

$query = "SELECT * FROM user WHERE username = '$u' and password='$p'";

$result = mysql_query($query);
$count = mysql_num_rows($result);
$tuple = mysql_fetch_array($result);

if ($count == 1) {
    $expiredtime = 60 * 60 * 24 * 30;
    if ( $rm == "1") {
        setcookie('username', $u, time()+$expiredtime +'/'+'localhost/progin2');
        setcookie('password', $p, time()+$expiredtime +'/'+'localhost/progin2');
    } else {
        setcookie('username', $u, false +'/'+'localhost/progin2');
        setcookie('username', $p, false +'/'+'localhost/progin2');
    }
    echo "1";
} else {
    echo "Wrong Username or Password";
}

mysql_close($conn);
?>
