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
  session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
    
    header("location:index.html");
    echo "<html><head></head><body><script>alert('Please login first');</script></body></html>";
    exit;
}
include 'connect.php';

?>      

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <script>
          function calculateTotalPrice() {
            var weight = parseFloat(document.getElementById("weight").value);
            var price = parseFloat(document.getElementById("price").value);
            
            if (isNaN(weight) || isNaN(price)) {
              document.getElementById("result").innerHTML = "";
            } else {
              var totalPrice = weight * price;
              document.getElementById("result").innerHTML = "Total Price: ₹" + totalPrice.toFixed(2);
            }
          }

            function previewImage(input) {
                if (input.files && input.files[0]) { // if (input.files && input.files): This checks if the input element (the file input field) has a files property, and if the first file in the files array exists. This ensures that a file has actually been selected.
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('uploaded-image').src = e.target.result;
                        document.getElementById('uploaded-image').style.display = 'block';
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-white border-bottom">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Brandlogo"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-auto  mb-2 ">
                      <li class="nav-item">
                        <a class="nav-link tt" aria-current="page" href="#">Seller</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link tt" href="#">Buyer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link tt" href="#">Mandi Price</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link tt" href="#">Price</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle tt" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          More
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="navbar-nav ms-3 mb-2">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Hindi</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span><?php echo $_SESSION["username"]; ?></span>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="mp.php">My Posts</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            
        </ul>
    </li>
</ul>
                  </div>
                </div>
              </nav>
        </header>
        <main>
          <div class="d-flex ms-auto me-auto justify-content-center align-items-center mt-5">
            <div style="border: solid;" class="w-25 rounded d-flex justify-content-center">
                
            <form method="post" enctype="multipart/form-data" action="hf2.php">
                <div class="form-group mt-5">
                    <h2 class="text-center mb-4">Publish AD</h2>
                    <input type="text" class="form-control mb-2" id="email" placeholder="POST TITLE" name="pt" required >
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="cat">
                  <option selected>Category</option>
                  <option value="Vegetable">Vegetable</option>
                  <option value="Fruit">Fruit</option>
                  <option value="Millets">Millets</option>
                  <option value="leafy">Leafy-Vegetable</option>
                  <option value="dry">Dry-Fruit</option>

                </select>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" class="form-control" id="weight" name="weight" aria-describedby="emailHelp" placeholder="Weight(KG)" step="0.01" oninput="calculateTotalPrice()">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" step="0.01" oninput="calculateTotalPrice()" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Price per KG">
                </div>
                <p id="result"></p>
                <div class="mb-3">
                <tr>

                    <th>Select Image:</th>
                    <td>
                        <div class="form-group file-input">
                            <div class="photo-frame">
                                <img id="uploaded-image" src="#" alt="Uploaded Image" width="150" height="150" style="display: none;">
                            </div>
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" onchange="previewImage(this)">
                        </div>
                    </td>
                </tr>
                </div>
                  <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cnt"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5 w-100" name="submit">Publish</button>
            </form>
            </div>
        </div>


            
        </main>
        <!-- footer -->

        <footer class="mt-5">
            <div class="greenaccord-footer-container">
                <div class="greenaccord-footer-left">
                    <div class="greenaccord-footer-logo">
                        <img src="images/logo2.png" alt="GreenAccord Logo"> 
                    </div>
                    <p>Growing partnerships, securing futures  where trust meets opportunity in contract farming.</p>
                    <div class="greenaccord-social-icons">
                        <a href="#"><img src="images/twitter1.png" alt="Twitter"></a>
                        <a href="#"><img src="images/whatsapp.png" alt="WhatsApp"></a>
                        <a href="#"><img src="images/linkdin.png" alt="LinkedIn"></a>
                    </div>
                </div>
                <div class="greenaccord-footer-right">
                    <div class="greenaccord-footer-column">
                        <a href="#">Home</a>
                        <a href="#">About Us</a>
                        <a href="#">Services</a>
                        <a href="#">Career</a>
                    </div>
                    <div class="greenaccord-footer-column">
                        <a href="#">Blog</a>
                        <a href="#">FAQs</a>
                        <a href="#">Testimonial</a>
                        <a href="#">Support</a>
                    </div>
                    <div class="greenaccord-footer-column">
                        <a href="#">Privacy</a>
                        <a href="#">Partners</a>
                    </div>
                </div>
            </div>
            <div class="greenaccord-footer-bottom">
                <p>© 2024 GreenAccord. All rights reserved.</p>
            </div>
  <style>
    footer {
      background-color: #1a1a1a; /* Dark background color */
      color: #fff; /* White text color */
      padding: 40px 20px; /* Added padding for better spacing */
      font-family: Arial, sans-serif; /* Ensure consistent font usage */
  }
  
  .greenaccord-footer-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
  }
  
  .greenaccord-footer-left {
      max-width: 300px;
  }
  
  .greenaccord-footer-logo img {
      width: 150px;
      margin-bottom: 10px;
  }
  
  .greenaccord-footer-left p {
      font-size: 14px;
      margin: 10px 0;
      line-height: 1.6;
  }
  
  .greenaccord-social-icons {
      margin-top: 20px; /* Increased margin for better spacing */
  }
  
  .greenaccord-social-icons a img {
      width: 24px;
      height: 24px;
      margin-right: 10px;
      transition: transform 0.3s ease, opacity 0.3s ease;
  }
  
  .greenaccord-social-icons a img:hover {
      transform: scale(1.2); /* Increased hover scale for better effect */
      opacity: 0.8; /* Slight opacity change on hover */
  }
  
  .greenaccord-footer-right {
      display: flex;
      gap: 60px; /* Increased space between columns */
  }
  
  .greenaccord-footer-column {
      display: flex;
      flex-direction: column;
  }
  
  .greenaccord-footer-column a {
      color: #ccc;
      text-decoration: none;
      margin-bottom: 12px; /* Increased space between links */
      font-size: 15px; /* Slightly increased font size */
      padding: 5px 0; /* Added padding for clickable area */
      transition: color 0.3s ease, padding-left 0.3s ease; /* Added transition for padding */
  }
  
  .greenaccord-footer-column a:hover {
      color: #fff;
      padding-left: 5px; /* Indent link on hover for a subtle effect */
  }
  
  .greenaccord-footer-bottom {
      border-top: 1px solid #444;
      margin-top: 30px; /* Increased margin for spacing */
      padding-top: 20px; /* Increased padding for separation */
      text-align: center;
  }
  
  .greenaccord-footer-bottom p {
      font-size: 13px; /* Slightly increased font size for readability */
      color: #ccc;
      margin: 0;
  }

  .form-group.file-input {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-group.file-input .photo-frame {
        width: 150px;
        height: 150px;
        border: 2px solid #ccc;
        border-radius: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .form-group.file-input .photo-frame img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .form-group.file-input label {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-group.file-input input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .form-group.file-input input[type="file"]:hover+label {
        background-color: #45a049;
    }
  
  
          
  
  </style>
  </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
