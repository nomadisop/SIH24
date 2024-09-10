<?php 
include 'connect.php';
session_start();
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
            <?php include 'navbar.php';?>
        </header>
        <main>
        <div class="container mt-5">
                    <h1 class="text-center mb-4">My Listing(s)</h1>
                    <div class="row">
<?php
        $em=$_SESSION['email'];
        $sql="SELECT * FROM post WHERE author='$em'";
                         $result= mysqli_query($conn,$sql);
                         while ($arr = mysqli_fetch_array($result)) {
                            $cat=$arr['type'];
                            $tt=$arr['title'];
                            $w=$arr['weight'];
                            $p=$arr['price'];
                            $c=$arr['content'];
                            $loc=$arr['name'];
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="images/postimageFarmer/<?php echo $loc; ?>" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $tt;?> </h5>
                                    <p class="card-text"><strong></strong>Category:<?php echo $cat;?></p>
                                    <p class="card-text"><strong>Weight:</strong><?php echo $w; ?> kg</p>
                                    <p class="card-text"><strong>Price per kg:</strong><?php echo $p; ?>/- Rupees</p>
                                    <p class="card-text">This is an example description of the product. It provides details about the item.</p>
                                    <a href="#" class="btn btn-primary">Message</a>
                                </div>
                            </div>
                        </div>

                        <?php }
                         ?>

</div>
</div>
        </main>
        <footer>
            <?php include 'footer.php' ; ?>
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
