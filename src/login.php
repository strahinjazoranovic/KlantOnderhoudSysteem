<?php
//-----------------------------------------------
//-- Naam script: login.php
//-- Omschrijving: Login en form logic
//-- Naam ontwikkelaar: JTnadrooi
//-- Project: KlantOnderHoudsysteem
//-- Datum: 28/03/2025
//------------------------------------------------
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('Location: welcome.php');
            exit;
        } else {
            echo "<p>Invalid password!</p>";
        }
    } else {
        echo "<p>User not found!</p>";
    }
}
?>

<h1>Login</h1>
<form method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>