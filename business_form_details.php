          <!-- Product Card -->
          <?php
                         include 'connect.php';
                         session_start();
                         $businessMan_id = $_SESSION['user_id']; 
                         $sql = "SELECT * FROM post WHERE businessman_id = ?";
    
    // Prepare and execute the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $businessMan_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        while ($arr = mysqli_fetch_array($result)) {
          
            $post_id = $arr['post_id']; // This is your advertisement ID
          

                         }
                        }
                        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Agreement Form</title>
    <style>
        body {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background color */
        }
        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: white; /* White background for the form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            max-width: 500px; /* Maximum width of the form */
            width: 100%; /* Full width on smaller screens */
        }
        h2 {
            text-align: center;
        }
        h3{
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; /* Full width for the submit button */
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Agreement Form</h2>
        <h3>Post ID:-2230</h3>
        <form action="submit_form.php" method="POST">

        <!-- Post user ID -->
        <input type="hidden" name="advertisement_id" value="<?php echo $post_id; ?>">
         <!-- Businessman's user ID -->
        <input type="hidden" name="business_id" value="<?php echo $_SESSION['user_id']; ?>"> 


        <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="CropName">Buying Crop:</label>
            <input type="text" id="CropName" name="CropName" required>

            <label for="weight">Quantity:</label>
            <input type="number" id="weight" name="weight" required>

            <label for="price">Fixed Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="DeliveryDate">Date of Delivery:</label>
            <input type="date" id="DeliveryDate" name="DeliveryDate" required>

            <label for="Address">Your Address:</label>
            <input type="text" id="Address" name="Address" required>

            <label for="AccountName">Farmer Account Name:</label>
            <input type="text" id="AccountName" name="AccountName" required>

            <label for="AccountNumber"> Farmer Account Number:</label>
            <input type="text" id="AccountNumber" name="AccountNumber" required>

            <label for="SignaturePhoto">Signature Photo:</label>
            <input type="file" id="SignaturePhoto" name="SignaturePhoto" accept="image/*" required>

            <label for="transportation">Transportation Manager:</label> 
            <select id="transportation" name="transportation" required>
                <option value="">Select...</option>
                <option value="farmer">Farmer</option>
                <option value="thirdParty">Third Party</option>
                <option value="cooperative">Company</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>

