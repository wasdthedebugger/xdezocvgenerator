<?php


require('conn.php');

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password == $password2){
        $sql = "INSERT INTO users (fname, lname, username, password) VALUES ('$fname', '$lname', '$username', '$password')";
        if(mysqli_query($conn, $sql)){
            echo "Registration successful";
        }else{
            echo "Some error occoured. Please try again later.";
        }
    }else{
        echo "Passwords do not match";
    }

   
}

?>
<nav>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <a href="register.php">Register</a>
</nav>
<form action="#" method="POST">
    <input type="text" name="fname" placeholder="enter your first name" id=""><br>
    <input type="text" name="lname" placeholder="enter your last name" id=""><br>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="password2" placeholder="Confirm Password"><br>
    <input type="submit" name="submit" value="Register">
    <a href="login.php">Login</a>
</form>