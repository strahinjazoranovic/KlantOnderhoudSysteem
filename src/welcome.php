<?php
// -----------------------------------------------
// -- Naam script: welcome.php
//-- Omschrijving: KlantOnderHoud pagina
//-- Naam ontwikkelaar: Strahinja Zoranovic
//-- Project: KlantOnderHoudsysteem
//-- Datum: 28/03/2025
------------------------------------------------
session_start();
require 'db.php';

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Retrieve the logged-in user's details
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$currentUser = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
</head>

<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
    <p><a href="logout.php">Logout</a></p>

    <?php if ($currentUser && $currentUser['is_admin']): ?>
        <h2>All Users</h2>
        <?php
        // Query to get all users
        $sql_all = "SELECT * FROM users";
        $result_all = $conn->query($sql_all);
        if ($result_all->num_rows > 0):
        ?>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Is Admin</th>
                </tr>
                <?php while ($row = $result_all->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo $row['is_admin'] ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>You do not have admin privileges to view all users.</p>
    <?php endif; ?>
</body>

</html>