<?php

ini_set("display_errors", 0);

$db = mysqli_connect('localhost', 'username', '', 'users');

// Check if the user has submitted the login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user with the given credentials
    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);

    // If a matching user is found, set a login session for them
    if (mysqli_num_rows($result) === 1) {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.html');
        exit;
        echo "logged in successfully";
    }
    else {
        $error = 'Invalid username or password';
    }
}
echo json_encode($error);

?>