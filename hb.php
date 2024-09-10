<?php 
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
        <style>
          .product-image {
    width: 100%; /* Makes the image take the full width of the card */
    height: 200px; /* Sets a fixed height for the image */
    object-fit: cover; /* Ensures the image covers the area without distortion */
}
        </style>
    </head>

    <body>
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
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </li>
</ul>
              </div>
            </div>
          </nav>
        </header>
        <main>
                <div class="container mt-5">
                    <h1 class="text-center mb-4">Product Listing</h1>
                    <div class="row">
                        <!-- Product Card -->
                         <?php
                         include 'connect.php';
                         $sql="SELECT u.state,u.district, p.title, p.content,p.type,p.weight,p.price,p.name FROM users AS u JOIN post AS p ON u.email= p.author";
                       
                         $result= mysqli_query($conn,$sql);
                         while ($arr = mysqli_fetch_array($result)) {
                        $cat=$arr['type'];
                        $tt=$arr['title'];
                        $w=$arr['weight'];
                        $p=$arr['price'];
                        $c=$arr['content'];
                        $loc=$arr['name'];
                        $st=$arr['state'];
                        $ds=$arr['district'];

                       

                        
                        
                        ?>
                        <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="images/postimageFarmer/<?php echo $loc; ?>" class="card-img-top product-image" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $tt; ?></h5>
                                <p class="card-text"><strong>Category:</strong> <?php echo $cat; ?></p>
                                <p class="card-text"><strong>Weight:</strong> <?php echo $w; ?> kg</p>
                                <p class="card-text"><strong>Price per kg:</strong> <?php echo $p; ?>/- Rupees</p>
                                <p class="card-text">This is an example description of the product. It provides details about the item.</p>
                                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                            </svg>
                                          <?php echo $ds,',',$st; ?>
                                          </p>
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
            <!-- place footer here -->
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
