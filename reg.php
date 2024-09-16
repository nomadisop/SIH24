<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greenaccord";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$first_name = $_POST['fname'] ?? '';
$last_name = $_POST['lname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$state = $_POST['state'] ?? '';
$district = $_POST['district'] ?? '';
$role = $_POST['role'] ?? '';

$password_hashed = password_hash($password, PASSWORD_BCRYPT);


$sql = "INSERT INTO users (fname, lname, email, phone, password, state, district, role) 
        VALUES ('$first_name', '$last_name', '$email', '$phone', '$password_hashed', '$state', '$district', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
