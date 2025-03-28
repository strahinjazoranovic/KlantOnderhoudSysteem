<?php
//-----------------------------------------------
//-- Naam script: db.php
//-- Omschrijving: Database connectie met alle gegevens 
//-- Naam ontwikkelaar: Jordan van Eijl
//-- Project: KlantOnderHoudsysteem
//-- Datum: 28/03/2025
//------------------------------------------------
$host = 'localhost'; // Your database host
$username = 'root';  // Your MySQL username
$password = '';      // Your MySQL password
$dbname = 'keuzedeel_duo'; // The name of your database, as per the provided JSON

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
