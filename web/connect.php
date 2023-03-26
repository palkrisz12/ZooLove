<?php
$dbconn = mysqli_connect("localhost", "root", "", "users");
if(mysqli_connect_error()){
    die("Hiba:".mysqli_connect_error());
}

if(isset($_GET["userName"]) && isset($_GET["password"]) && isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"]) && isset($_GET["age"])){

    $username = $_GET["userName"];
    $password = $_GET["password"];
    $firstname = $_GET["firstName"];
    $lastname = $_GET["lastName"];
    $email = $_GET["email"];
    $age = $_GET["age"];

    $sql = "INSERT INTO users (username ,firstname, lastname, age, email, password) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($dbconn, $sql);
    $stmt->bind_param('ssssss', $username, $firstname, $lastname, $age, $email, $password);

    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_error($stmt)){
        die("Hiba".mysqli_stmt_error($stmt));
    }



    $id = mysqli_insert_id($dbconn);
    echo json_encode($id);

} else {
    echo json_encode(array("error" => "Could not connect to database."));
}
?>