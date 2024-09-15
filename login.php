<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "role_based_login";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password']; 


$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
    if ($user['role'] == 'buyer') {
            header("Location: buyer_home.php");
        } elseif ($user['role'] == 'seller') {
            header("Location: seller_home.php");
        } elseif ($user['role'] == 'transport') {
            header("Location: transport_home.php");
        }
    } else {
        echo "Invalid password!";
    }
} else {
    echo "No user found with this email!";
}


$stmt->close();
$conn->close();
?>
