<?php

$server_name = 'localhost';
$user = 'root';
$password = '08029494195jayz';
$db_name = 'guestbook';

$conn = new mysqli($server_name, $user, $password, $db_name);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// print 'Connected successfully';