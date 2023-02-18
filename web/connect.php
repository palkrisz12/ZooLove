<?php
    $fnev = $_POST['fnev'];
    $psw = $_POST['psw'];
    $imell = $_POST['imell'];

    $conn = new mysqli('localhost','root', '', 'users');
    if($conn -> connect_error){
        die('Connection failed : '. $conn -> connect_error);
    }
    else{
        $stmt = $conn ->prepare("insert into felh(fnev,psw,imell) values(?, ?, ?)");
        $stmt -> bind_param("sss", $fnev, $psw, $imell);
        $stmt -> execute();
        echo "Registration succesfull!";
        $stmt -> close();
        $conn -> close();

    }



?>