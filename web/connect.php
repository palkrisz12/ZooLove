<?php
$dbconn = mysqli_connect("localhost", "root", "", "users") or die ("off");

if(isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["age"])){

    $username = $_POST["userName"];
    $password = $_POST["password"];
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    echo "$username, $password, $firstname, $lastname, $email, $age";

    $sql = "INSERT INTO users (username ,firstname, lastname, age, email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbconn -> prepare($sql);
    $stmt->bind_param('sssiss', $username, $firstname, $lastname, $age, $email, $password);

    $stmt -> execute();



    $id = mysqli_insert_id($dbconn);
    echo json_encode($id);

    header("location:./main.phtml");

} else {
    echo json_encode(array("error" => "Could not connect to database."));
}
?>