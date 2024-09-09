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
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select class="form-select mb-3 mt-5" aria-label="Default select example" name="type">
                  <option selected>Category</option>
                  <option value="Vegetable">Vegetable</option>
                  <option value="Fruit">Fruit</option>
                  <option value="Millets">Millets</option>
                  <option value="leafy">Cereal</option>
                  <option value="dry">Dry-Fruit</option>

                </select>

        <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"></label>
              <input type="number" class="form-control" id="email" name="emm" aria-describedby="emailHelp" placeholder="Weight(KG)">
            </div>
            <button type="submit" class="btn btn-success mb-5" name="submit">View Transport</button>

            </form>

            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cat=$_POST['type'];
        $w=$_POST['emm'];
        if($cat=="Vegetable" or "Fruit"){
            $sql="SELECT * FROM vehicles WHERE capacity>=$w and truck_type in('refrigerate','van')";
        $result= mysqli_query($conn,$sql);
        while ($arr = mysqli_fetch_array($result)) {
        $a=$arr['vehicle_no'];
        $b=$arr['truck_type'];
        $c=$arr['capacity'];
        $d=$arr['cpkm'];
        echo "<p>VehicleNO: $a</p>";
            echo "<p>TT: $b</p>";
            echo "<p>CAp: $c</p>";
            echo "<p>cpkm:$d</p>";
        }
        }
        elseif($cat="Millets" or "Cereal")
        $sql="SELECT * FROM vehicles WHERE capacity>=$w and truck_type='refrigerate' OR truck_type='van'";
        $result= mysqli_query($conn,$sql);







}














?>


        </main>




























        <footer>
            <!-- place footer here -->
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
