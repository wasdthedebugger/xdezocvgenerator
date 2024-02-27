<?php
require('conn.php');

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

// Associative array

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo $users[0]['username'];