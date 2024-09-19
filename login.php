<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greenaccord";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['pass']; 


$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
            session_start();
            $b=$user['email'];
            $id=$user['id'];
            $fname=$user['fname'];
            $_SESSION['role']=$user['role'];
            $_SESSION['email']=$b;
            $_SESSION["loggedin"]=true;
            $_SESSION["username"]=$fname;
            $_SESSION['user_id']=$id;
    if ($user['role'] == 'Buyer') {
            header("Location: hb.php");
        } elseif ($user['role'] == 'Farmer') {
            header("Location: mp.php");
        } elseif ($user['role'] == 'Transport') {
            header("Location: ht.php");
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
