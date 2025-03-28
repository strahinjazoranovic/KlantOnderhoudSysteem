<?php
//-----------------------------------------------
//-- Naam script: db.php
//-- Omschrijving: Database connectie met alle gegevens 
//-- Naam ontwikkelaar: JTnadrooi
//-- Project: KlantOnderHoudsysteem
//-- Datum: 28/03/2025
//------------------------------------------------
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'keuzedeel_duo';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
