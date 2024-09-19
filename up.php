<?php

include 'connect.php';
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

}
}
else{
    $image_name=$_SESSION['loc'];
}



    $pp=$_SESSION['pid'];

    $sql="UPDATE `post` SET `type`='$cat',`title`='$pt',`author`='$a',`price`=$p,`weight`=$w,`content`='$cnt',`name`='$image_name' WHERE id=$pp";
    $result= mysqli_query($conn,$sql);
    header("location:mp.php");
}





?>
