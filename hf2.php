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
session_start();
if(isset($submit)){
    $pt=$_POST['pt'];
    $cat=$_POST['cat'];
    $w=$_POST['weight'];
    $p=$_POST['price'];
    $cnt=$_POST['cnt'];
    $currentDate = date('d/m/y');
    $a=$_SESSION['email'];



    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

if ($image_name != "") {
    $ext = pathinfo($image_name, PATHINFO_EXTENSION);

// seting the image name for every image i am storing , for making a unique image name i am adding a rand number between 0000 to 9999
$image_name = "Crop-Name-" . rand(0000, 9999) . "." . $ext;
$src = $_FILES['image']['tmp_name'];
// this is the destination of where will the file will be uploaded 
$dst = "./images/postimageFarmer/" . $image_name;
$upload = move_uploaded_file($src, $dst);

if ($upload == false) {
    //Failed to Upload the image
    //REdirect to Add Food Page with Error Message
    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
    //header('location:' . SITEURL . 'admin/add-food.php');
    //STop the process
    die();
}
}
} else {
$image_name = ""; //SEtting DEfault Value as blank
}






    $sql="INSERT INTO `post` (`id`, `type`, `title`, `author`, `price`, `weight`, `date`, `status`, `content`,`name`) VALUES (NULL, '$cat', '$pt', '$a', $p, $w, $currentDate, '0', '$cnt','$image_name')";
    $result= mysqli_query($conn,$sql);
    header("location:mp.php");
}


?>
