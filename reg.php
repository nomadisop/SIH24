<?php
try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "greenaccord";    
    $conn = new mysqli($server, $username, $password, $database); // connecting to the database

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error); // exception occurred
    }
} catch (Exception $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = test_input($_POST["first_name"]); 
    $lname = test_input($_POST["last_name"]);  
    $state = test_input($_POST["state"]);
    $phone = test_input($_POST["phone"]);       
    $email = test_input($_POST["email"]);     
    $district = test_input($_POST["district"]);
    $password = test_input($_POST["password"]); 
    $role = test_input($_POST["role"]);
    $confirm_password = test_input($_POST["cpp"]); 

    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`fname`, `lname`, `state`, `district`, `email`, `phone`, `password`, `role`) 
                VALUES ('$fname', '$lname', '$state', '$district', '$email', $phone, '$hashed_password', '$role')";
        $result = mysqli_query($conn, $sql);
        header("Location: login.html");
    } else {
        echo "Passwords do not match!";
    }
}
?>























// try {
    //     $server="localhost";
    //     $username="root";
    //     $password="";
    //     $database="greenaccord";    
    //     $conn = new mysqli($server,$username,$password,$database);  //connecting database
    
    //     if ($conn->connect_error) {
    //         throw new Exception("Connection failed: " . $conn->connect_error); //exception occured
    //     }
    // } catch (Exception $e) {
    //     // Handle connection error
    //     echo "Error: " . $e->getMessage();
    //     exit();
    // }

    // $submit = $_POST['submit'];

    // if(isset($submit)){
    //     function test_input($data) {
    //         $data = trim($data);
    //         $data = stripslashes($data);
    //         $data = htmlspecialchars($data);
    //         return $data;
    //       }
    //     $fname=test_input($_POST["fname"]);
    //     $lname=test_input($_POST["lname"]);
    //     $state=test_input($_POST["state"]);
    //     $phone=test_input($_POST["phn"]);
    //     $emm=test_input($_POST["emm"]);
    //     $district=test_input($_POST["district"]);
    //     $pass=test_input($_POST["pp"]);
    //     $role=test_input($_POST["role"]);
    //     $cp=test_input($_POST["cpp"]);

    //     if($pass==$cp){
    //         $hash=password_hash($pass,PASSWORD_DEFAULT);
    //     $sql="INSERT INTO `users` (`fname`, `lname`, `state`, `district`, `email`,`phone`, `password`, `role`) VALUES ('$fname', '$lname', '$state', '$district', '$emm',$phone, '$hash', '$role')";
    //     $result= mysqli_query($conn,$sql);
    //     header("location:login.html");
    //     }

    //     }

