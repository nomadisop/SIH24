<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

include 'connect.php';

// Get the logged-in user's ID
$idd=$_GET['id'];

$user_id = $_SESSION['user_id'];
// Fetch other users for selection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .chat-container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        #messages {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div
        class="row justify-content-center align-items-center g-2">
        <?php
        $queryString ="SELECT u.state,u.district, p.title, p.content,p.type,p.weight,p.price,p.name FROM users AS u JOIN post AS p ON u.email= p.author where author=$idd";
                       
                          $result= mysqli_query($conn,$queryString);
                          while ($arr = mysqli_fetch_array($result)) {
                         $cat=$arr['type'];
                         $tt=$arr['title'];
                         $w=$arr['weight'];
                         $p=$arr['price'];
                         $c=$arr['content'];
                         $loc=$arr['name'];
                         $st=$arr['state'];
                         $ds=$arr['district']; ?>
        <div class="col">
        
                            <div class="card mb-4">
                                <img src="images/postimageFarmer/<?php echo $loc; ?>" class="card-img-top product-image" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $tt; ?></h5>
                                    <p class="card-text"><strong>Category:</strong> <?php echo $cat; ?></p>
                                    <p class="card-text"><strong>Weight:</strong> <?php echo $w; ?> kg</p>
                                    <p class="card-text"><strong>Price per kg:</strong> <?php echo $p; ?>/- Rupees</p>
                                    <p class="card-text"><?php echo $c; ?></p>
                                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                                </svg>
                                              <?php echo $ds,',',$st; ?>
                                              </p>
                                </div>
                            </div>
                        </div>
            
                            <?php } ?>
        <div class="col">
            
        <div class="chat-container">
    <h2>Chat</h2>
    
    
    <?php $sql ="SELECT id,fname FROM users WHERE id = $idd";
$result=mysqli_query($conn,$sql);
$arr=mysqli_fetch_array($result);
            echo htmlspecialchars($arr['fname']);  ?>
    

    <div id="messages"></div>

    <input type="text" id="message" placeholder="Type your message...">
    <button id="send">Send</button>
</div>
</div>
    </div>
    


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


// Assign the PHP variable to the JavaScript variable
let selectedUserId = <?php echo $idd; ?>;
// Fetch messages every 2 seconds
setInterval(fetchMessages, 2000);

$('#send').click(function() {
    const message = $('#message').val();
    
    if (message.trim() !== '') {
        $.post('send_message.php', { message: message, receiver_id: selectedUserId }, function() {
            $('#message').val('');
            fetchMessages(); // Refresh messages after sending
        });
    }
});

function fetchMessages() {
    $.get('fetch_messages.php?receiver_id=' + selectedUserId, function(data) {
        const messages = JSON.parse(data);
        $('#messages').empty();
        
        messages.forEach(function(msg) {
            $('#messages').append('<strong>' + msg.fname + ':</strong> ' + msg.message + '<br>');
        });
        
        // Scroll to the bottom of the messages div
        $('#messages').scrollTop($('#messages')[0].scrollHeight);
    });
}
</script>

</body>
</html>