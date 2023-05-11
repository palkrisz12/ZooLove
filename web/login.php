<?php

session_start();
$_SESSION['user']= NULL;
$_SESSION['userID']= NULL;
$dbconn = mysqli_connect("localhost", "root", "", "users") or die ("off");

$username = $_POST["uName"];
$password = $_POST["password"];


$stmt = $dbconn -> prepare("select * from users where username =?");
$stmt -> bind_param("s",$username);
$stmt -> execute();
$result = $stmt -> get_result();

$e = $result -> fetch_assoc();
if($e['password']===$password)
{
    $_SESSION['userID']=$e['id'];
    $_SESSION['user']=$username;

    header("location:./main.phtml");


}





?>