<?php

include 'connect.php';
$submit = $_POST['submit'];
$flag=0;

if(isset($submit)){
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    $sql="select * from users where email='$uname'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        $arr=mysqli_fetch_array($result);
       
        if(password_verify($pass,$arr['password'])){
            $login=true;
            session_start();
            $b=$arr['email'];
            $fname=$arr['fname'];
            $_SESSION['role']=$arr['role'];
            $_SESSION['email']=$b;
            $_SESSION["loggedin"]=true;
            $_SESSION["username"]=$fname;
            $_SESSION['cart']=array();
            
            if($_SESSION['role']=='Farmer'){
                header("location: hf1.php");
            }
            elseif($_SESSION['role']=='Buyer'){
                header("location:hb.php");

            }
            elseif($_SESSION['role']=='Transport'){
                header("location:ht.php");
            }   
            
        }

        else{
            echo "<script>alert('Invalid username or password. Please double-check your credentials and try again.');
            window.history.back();</script>";
        }
}




?>