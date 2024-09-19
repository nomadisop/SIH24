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
            <?php session_start();
            include 'connect.php'; 
            include 'navbar.php'; ?>
        </header>
        <main>

<h1 style="text-align:center">MY CHATS</h1>
        <div class="d-flex">
            <?php 
            $uid=$_SESSION['user_id'];
            
            $sql="select u.fname,m.sender_id,m.created_at from messages m JOIN users u ON m.sender_id=u.id where receiver_id=$uid GROUP BY sender_id";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){

            
            while($array=mysqli_fetch_array($result)){
            ?>
            <div class="list-group mb-5 w-75 justify-content-center ms-auto me-auto" >
                <?php 
                $sid=$array['sender_id'];
                ?>
            <a href="chat.php?id=<?php echo $sid;?>" class="list-group-item list-group-item-action ">
                <?php 
                $f=$array['fname']; 
                echo $f,'  last message at ',$array['created_at']; ?>
            </a>
            </div>
        </div>
        <?php }} 
        else{
            echo "<h2>No Chats available</h2>";
        }?>
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
