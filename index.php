<?php
session_start();
if (!isset($_SESSION['username'])) {
    die("you need to login to access this page <a href='login.php'>Login</a>");
}
require('conn.php');


?>

<style>
    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    form input {
        margin: 10px;
        padding: 10px;
        width: 300px;
    }
</style>
<nav>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <a href="register.php">Register</a>
</nav>
<div class="main">
    <h1>Welcome to XDezo CV Generator,
        <?php echo $_SESSION['username']; ?>
    </h1>

    <?php
    $sql = "SELECT * FROM details WHERE username = '" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Your CV has been generated already</h2>";
    }else{
    ?>
    <form action="generatecv.php" method="POST" enctype="multipart/form-data">
        <input type="number" name="age" placeholder="enter your age" id=""><br>

        <input type="text" name="gender" placeholder="enter your gender"><br>

        <input type="text" name="email" placeholder="enter your email" id=""><br>
        <input type="file" name="photo" id="">

        <br><br>
        <input type="submit" name="submit" value="Generate CV">
    </form>
    <?php
    }
    ?>

</div>