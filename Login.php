<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$users = [
    'admin' => '1234',    
    'user1' => 'password1',
    'user2' => 'password2'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $username = trim($username);
    $password = trim($password);

    if (isset($users[$username]) && $users[$username] === $password) {
        echo "<h1>Welcome, $username!</h1>";
        echo '<a href="dashboard.html">Go to Dashboard</a>';
    } else {
        echo '<h1>Invalid username or password!</h1>';
        echo '<a href="login.html">Try again</a>';
    }
} else {
    echo '<h1>Access denied. Please use the login form.</h1>';
    echo '<a href="login.html">Go to Login Page</a>';
}
?>
