<?php

$host = 'localhost';
$dbname = 'your_database';
$username = 'your_username';
$password = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
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

// Function to get customer by ID
function getCustomerById($customer_id)
{
    global $pdo;
    $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['customer_id' => $customer_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update customer details
function updateCustomer($customer_id, $name, $email, $phone)
{
    global $pdo;
    $sql = "UPDATE customers SET name = :name, email = :email, phone = :phone WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'customer_id' => $customer_id]);
}

// Function to delete a customer
function deleteCustomer($customer_id)
{
    global $pdo;
    $sql = "DELETE FROM customers WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['customer_id' => $customer_id]);
}

// Function to place an order
function placeOrder($customer_id, $total_amount)
{
    global $pdo;
    $sql = "INSERT INTO orders (customer_id, total_amount) VALUES (:customer_id, :total_amount)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['customer_id' => $customer_id, 'total_amount' => $total_amount]);
}

// Function to get all orders for a customer
function getOrdersByCustomer($customer_id)
{
    global $pdo;
    $sql = "SELECT * FROM orders WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['customer_id' => $customer_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get order by ID
function getOrderById($order_id)
{
    global $pdo;
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['order_id' => $order_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update order status
function updateOrderStatus($order_id, $status)
{
    global $pdo;
    $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['status' => $status, 'order_id' => $order_id]);
}

// Function to delete an order
function deleteOrder($order_id)
{
    global $pdo;
    $sql = "DELETE FROM orders WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['order_id' => $order_id]);
}

// Example usage:
if (addCustomer('John Doe', 'johndoe@example.com', '1234567890')) {
    echo "Customer added successfully!<br>";
}

$customer = getCustomerByEmail('johndoe@example.com');
if ($customer) {
    echo "Customer Found: " . $customer['name'] . "<br>";

    if (placeOrder($customer['customer_id'], 99.99)) {
        echo "Order placed successfully!<br>";
    }
}
