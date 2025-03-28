<?php
// welcome.php: Welcome page after login
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "<h1>Welcome, " . $_SESSION['email'] . "!</h1>";
echo "<p><a href='logout.php'>Logout</a></p>";
