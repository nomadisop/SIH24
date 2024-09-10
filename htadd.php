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
            <?php session_start();
            include 'navbar.php';?>
        </header>
        <main>

        <div class="d-flex ms-auto me-auto justify-content-center align-items-center mt-5">
            <div style="border: solid;" class="w-25 rounded d-flex justify-content-center">
                
            <form method="post" enctype="multipart/form-data" action="htad2.php">
                <div class="form-group mt-5">
                    <h2 class="text-center mb-4">Publish AD</h2>
                    <input type="text" class="form-control mb-2" id="email" placeholder="Vehicle Number" name="pt" required >
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="cat">
                  <option selected>Category</option>
                  <option value="Flatbed">Flatbed</option>
                  <option value="Van">Van</option>
                  <option value="Refrigerated">Refrigerated</option>
                  <option value="Box">Box</option>

                </select>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" class="form-control" id="weight" name="weight" aria-describedby="emailHelp" placeholder="Capacity(KG)" step="0.01" oninput="calculateTotalPrice()">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Price per KM">
                </div>
                <p id="result"></p>
                <div class="mb-3">
                <tr>

                    <th></th>
                    <td>
                        <div class="form-group file-input">
                            <div class="photo-frame">
                                <img id="uploaded-image" src="#" alt="Uploaded Image" width="150" height="150" style="display: none;">
                            </div>
                            <label for="image">Upload vehicle RC</label>
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
        <footer>
            <?php include 'footer.php'; ?>
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
