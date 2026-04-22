<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS autosamsi";
if ($mysqli->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $mysqli->error . "\n";
}

$mysqli->close();
