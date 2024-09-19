<?php 
include 'connect.php';
session_start();
$i=$_GET['id'];
$_SESSION['pid']=$i;
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
            <?php include 'navbar.php'; ?>
        </header>
        <main>
            <?php 
                $sql="select * from post where id=$i";
                $result=mysqli_query($conn,$sql);
                $arr = mysqli_fetch_array($result);
                $t=$arr['title'];
                $w=$arr['weight'];
                $p=$arr['price'];
                $c=$arr['content'];
                $loc=$arr['name'];
                $_SESSION['loc']=$loc;
            ?>
          <div class="d-flex ms-auto me-auto justify-content-center align-items-center mt-5">
            <div style="border: solid;" class="w-25 rounded d-flex justify-content-center">
                
            <form method="post" enctype="multipart/form-data" action="up.php">
                <div class="form-group mt-5">
                    <h2 class="text-center mb-4">Publish AD</h2>
                    <input type="text" class="form-control mb-2" id="email" placeholder="POST TITLE" name="pt" required  value="<?php echo $t; ?>">
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="cat" required>
                  <option value="Vegetable">Vegetable</option>
                  <option value="Fruit">Fruit</option>
                  <option value="Millets">Millets</option>
                  <option value="leafy">Leafy-Vegetable</option>
                  <option value="dry">Dry-Fruit</option>

                </select>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" class="form-control" id="weight" name="weight" aria-describedby="emailHelp" placeholder="Weight(KG)" step="0.01" oninput="calculateTotalPrice()" value="<?php echo $w; ?>"> 
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" step="0.01" oninput="calculateTotalPrice()" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Price per KG" value="<?php echo $p; ?>">
                </div>
                <p id="result"></p>
                <div class="mb-3">
                <tr>

                    <th>Select Image:</th>
                    <td>
                        <div class="form-group file-input">
                            <div class="photo-frame">
                                <img id="uploaded-image" src="images/postimageFarmer/<?php echo $loc; ?>" alt="Uploaded Image" width="150" height="150" >
                            </div>
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" onchange="previewImage(this)">
                        </div>
                    </td>
                </tr>
                </div>
                  <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cnt"><?php echo $c; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5 w-100" name="submit">Update</button>
            </form>
            <style> .form-group.file-input {
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
            </div>
        </div>


            
        </main>
        <footer>
            <?php include 'footer.php';?>
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
