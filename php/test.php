<?php

$host = "127.0.0.1";
$dbname = "keuzedeel_duo";
$username = "root"; // Change if needed
$password = ""; // Change if needed

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to add a customer
function addCustomer($name, $email, $phone)
{
    global $pdo;
    $sql = "INSERT INTO customers (name, email, phone) VALUES (:name, :email, :phone)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
}

// Function to get customer by email
function getCustomerByEmail($email)
{
    global $pdo;
    $sql = "SELECT * FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to place an order
function placeOrder($customer_id, $total_amount)
{
    global $pdo;
    $sql = "INSERT INTO orders (customer_id, total_amount) VALUES (:customer_id, :total_amount)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['customer_id' => $customer_id, 'total_amount' => $total_amount]);
}

// Example usage:
if (addCustomer('John Doe', 'johndoe@example.com', '1234567890')) {
    echo "Customer added successfully!<br>";
}

$customer = getCustomerByEmail('johndoe@example.com');
if ($customer) {
    echo "Customer Found: " . $customer['name'] . "<br>";

    if (placeOrder($customer['customer_id'], 99.99)) {
        echo "Order placed successfully!";
    }
}
