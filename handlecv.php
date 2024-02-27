<?php

if (!isset($_POST['submit'])) {
    die("Form not submitted");
}

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$company = $_POST['company'];

// Displaying it in a table with some basic styling

echo "<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>";

echo "<table>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Age</th>";
echo "<th>Email</th>";
echo "<th>Gender</th>";
echo "<th>Address</th>";
echo "<th>Phone</th>";
echo "<th>Company</th>";
echo "</tr>";
echo "<tr>";
echo "<td>$name</td>";
echo "<td>$age</td>";
echo "<td>$email</td>";
echo "<td>$gender</td>";
echo "<td>$address</td>";
echo "<td>$phone</td>";
echo "<td>$company</td>";
echo "</tr>";
echo "</table>";

