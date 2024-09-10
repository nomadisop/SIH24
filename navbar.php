<?php include 'connect.php'; ?>


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
          <?php 
            if($_SESSION['role']=='Farmer'){
              $add='mp.php';
            
            }
            elseif($_SESSION['role']=='Transport'){
             $add='ht.php';
            
            }
          
          
          ?>
            <li><a class="dropdown-item" href="<?php echo $add;?>">My Posts</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            
        </ul>
    </li>
</ul>
                  </div>
                </div>
</nav>