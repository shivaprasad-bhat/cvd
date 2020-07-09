<?php

# Common script to create connections
# User name and passwords has to be filled based on the server locations
# Setting to local host for development.

$hostname = 'localhost';
$dbname = 'CVDCareDB';
$username = strval(trim($_SESSION['user']));
$password = strval(trim($_SESSION['password']));

$conn = new mysqli($hostname, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
