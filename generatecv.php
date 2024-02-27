<?php
session_start();
require('conn.php');

if (!isset($_POST['submit'])) {
    die("Form not submitted");
}

$name = $_SESSION['username'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
// access the file
$photo = $_FILES['photo'];

// move the file to the uploads folder
move_uploaded_file($photo['tmp_name'], "uploads/" . $photo['name']);

// Insert the details into the database
$merophoto = "uploads/" . $photo['name'];

$sql = "INSERT INTO details (username, age, gender, email, merophoto) VALUES ('$name', '$age', '$gender', '$email', '$merophoto')";
if(mysqli_query($conn, $sql)){
    echo "<script>alert('CV generated successfully')</script>";
}else{
    echo "Some error occoured. Please try again later.";
}


// Placeholder image URL
$image_url = "uploads/" . $photo['name'];

?>

<!-- CSS styling for the CV box -->
<style>
    h2{
        text-align: center;
    }
    .cv-box {
        border: 2px solid black;
        padding: 20px;
        width: 600px;
        margin: 0 auto;
        background-color: #f9f9f9;
        border-radius: 0px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 16px; /* Adjust font size here */
    }
    .cv-details {
        margin-bottom: 10px;
        font-size: 24px; /* Adjust font size here */
    }
    .cv-image {
        text-align: center;
        margin-bottom: 20px;
    }
    .cv-section {
        margin-bottom: 20px;
    }
    @media print {
        .cv-box {
            width: 210mm;
            height: 310mm;
            margin: 0 auto;
        }
    }
</style>

<!-- CV box with details -->
<div class='cv-box'>
    <h2>Curriculum Vitae</h2>
    <div class='cv-image'><img src='<?=$image_url?>' alt='Profile Picture'></div>
    <div class='cv-section'>
        <h3 style='font-size: 20px;'>Personal Information</h3>
        <div class='cv-details'>Name: <?=$name?></div>
        <div class='cv-details'>Age: <?=$age?></div>
        <div class='cv-details'>Email: <?=$email?></div>
        <div class='cv-details'>Gender: <?=$gender?></div>
    </div>
    <div class='cv-section'>
        <h3 style='font-size: 24px;'>Experience</h3>
        <ul style='font-size: 24px;'> <!-- Adjust font size here -->
            <li>Job Title, Company Name, Dates</li>
            <li>Job Title, Company Name, Dates</li>
        </ul>
    </div>
</div>
