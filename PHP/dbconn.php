<?php

$conn = new mysqli("localhost","root","","videos");
$result = $conn->query("SET NAMES 'utf8'");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
