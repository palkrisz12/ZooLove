<?php
session_start();

if($_SESSION['user']!== 0){
    unset($_SESSION['user']);
    session_destroy();
    header("location:./login.html");
die;
}


?>