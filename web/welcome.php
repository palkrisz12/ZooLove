<?php
// Connect to your database
$db = mysqli_connect('localhost', 'username', '', 'users');

// Check if the user has submitted the login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user's login credentials from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user with the given credentials
    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);

    // If a matching user is found, set a login session for them
    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['user_id'] = mysqli_fetch_assoc($result)['id'];
        header('Location: dashboard.php');
        exit;
    }
    else {
        $error = 'Invalid username or password';
    }
}
?>