<?php

setcookie('username', '', time()-3600 +'/'+'localhost/progin2');
setcookie('password', '', time()-3600 +'/'+'localhost/progin2');

header('Location:../index.php') ;

?>
