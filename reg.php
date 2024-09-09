<?php
    try {
        $server="localhost";
        $username="root";
        $password="";
        $database="greenaccord";    
        $conn = new mysqli($server,$username,$password,$database);  //connecting database
    
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error); //exception occured
        }
    } catch (Exception $e) {
        // Handle connection error
        echo "Error: " . $e->getMessage();
        exit();
    }

    $submit = $_POST['submit'];

    if(isset($submit)){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        $fname=test_input($_POST["fname"]);
        $lname=test_input($_POST["lname"]);
        $state=test_input($_POST["state"]);
        $phone=test_input($_POST["phn"]);
        $emm=test_input($_POST["emm"]);
        $district=test_input($_POST["district"]);
        $pass=test_input($_POST["pp"]);
        $role=test_input($_POST["role"]);
        $cp=test_input($_POST["cpp"]);

        if($pass==$cp){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`fname`, `lname`, `state`, `district`, `email`,`phone`, `password`, `role`) VALUES ('$fname', '$lname', '$state', '$district', '$emm',$phone, '$hash', '$role')";
        $result= mysqli_query($conn,$sql);
        header("location:login.html");
        }

        }

?>      