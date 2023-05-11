<?php
session_start();
$dbconn = mysqli_connect("localhost", "root", "", "users") or die ("off");

if(isset($_POST["name"]) && isset($_POST["species"]) && isset($_POST["sex"]) && isset($_POST["descr"]) && isset($_POST["age"]) && isset($_POST["pic"])){

    $name = $_POST["name"];
    $species = $_POST["species"];
    $sex = $_POST["sex"];
    $descr = $_POST["descr"];
    $age = $_POST["age"];
    $pic = $_POST["pic"];
    $uid = $_SESSION['userID'];


    $sql = "INSERT INTO animals (name ,species, sex, descr, age, pic, userID) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbconn -> prepare($sql);
    $stmt->bind_param('ssssisi', $name, $species, $sex, $descr, $age, $pic, $uid);

    $stmt -> execute();



    $id = mysqli_insert_id($dbconn);
    echo json_encode($id);

    header("location:./allatfeltoltes.phtml");

} else {
    echo json_encode(array("error" => "Could not connect to database."));
}
?>