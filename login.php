<?php
session_start();

require('conn.php');


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        echo "Login successful";
        header("Location: index.php");

    }else{
        echo "Invalid username or password";
    }

   
}

?>
<nav>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <a href="register.php">Register</a>
</nav>
<form action="#" method="POST">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" name="submit" value="Login">
</form>