<?php
session_start();
session_destroy();
$_SESSION = array();
$link = "<script>window.open('login2.html')</script>";
$close =  "<script>window.close();</script>";
echo $link;
echo $close;

?>

