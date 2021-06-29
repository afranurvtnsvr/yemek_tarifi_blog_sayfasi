<?php
session_start();
error_reporting(0);// var olan hatalrı gözükmemesini sağlıyor
session_destroy();
header('Location:index.php');
exit;
?>