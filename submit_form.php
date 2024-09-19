<?php
session_start();
include 'connect.php'; // Include your database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required POST variables are set
    if (isset($_POST['advertisement_id']) && isset($_SESSION['user_id'])) {
        $advertisement_id = $_POST['advertisement_id'];
        $farmer_id = $_SESSION['user_id']; // Get farmer ID from session
        $fullName = $_POST['fullName']; // Farmer's full name
        $cropName = $_POST['CropName']; // Crop name
        $role = $_SESSION['role'];
        $price = $_POST['price']; // Price per unit
        $weight = $_POST['weight']; // Quantity
        $dateOfDelivery = $_POST['DeliveryDate']; // Date of delivery
        $address = $_POST['Address']; // Farmer's address
        $accountName = $_POST['AccountName']; // Account name
        $accountNumber = $_POST['AccountNumber']; // Account number
        $transportation = $_POST['transportation']; // Transportation method

        if (isset($_FILES['image']['name']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
        
            // Check if a file was uploaded
            if ($image_name != "") {
                // Get the file extension
                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        
                // Set allowed file extensions
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        
                // Validate the file type
                if (!in_array($ext, $allowed_extensions)) {
                    $_SESSION['upload'] = "<div class='error'>Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.</div>";
                    header('location: your_previous_page.php'); // Redirect to previous page with error message
                    die();
                }
        
                // Generate a unique image name
                $image_name = "signature-" . rand(0000, 9999) . "." . $ext;
                $src = $_FILES['image']['tmp_name'];
                
                // Set the destination path for the uploaded file
                $dst = "./images/postimageFarmer/" . $image_name;

                // Attempt to move the uploaded file to the destination
                if (move_uploaded_file($src, $dst)) {
                    // Upload successful, proceed with database insertion
                    
                    // Prepare SQL statement to insert into form_submission table
                    $sql = "INSERT INTO form_submission (userID, Productid, `Name`, cropName, role, price, weight, DateOfDelivery, `Address`, `Account Name`, `Account Number`, transportation, `Signature`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "iissidsssssss", 
                            $farmer_id, 
                            $advertisement_id, 
                            $fullName, 
                            $cropName, 
                            $role,
                            $price, 
                            $weight, 
                            $dateOfDelivery, 
                            $address, 
                            $accountName, 
                            $accountNumber, 
                            $transportation,
                            $image_name
                        );
                        
                        if (mysqli_stmt_execute($stmt)) {
                            echo "<script>alert('Farmer form submitted successfully!'); window.location.href='your_previous_page.php';</script>";
                        } else {
                            echo "<script>alert('Error submitting farmer form.'); window.history.back();</script>";
                        }
                        
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<script>alert('Error preparing statement.'); window.history.back();</script>";
                    }
                } else {
                    echo "<script>alert('Failed to move uploaded file.'); window.history.back();</script>";
                }
            }
        } else {
            echo "<script>alert('No file uploaded or there was an upload error.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid request.'); window.history.back();</script>";
    }
}

// Close connection
mysqli_close($conn);
?>