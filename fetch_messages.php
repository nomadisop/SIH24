<?php
session_start();
include 'connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Get the receiver ID from URL parameters
    $receiver_id = intval($_GET['receiver_id']);
    
    // Fetch messages where either user is involved
    // $sql = "SELECT m.message, u.fname FROM messages m JOIN users u ON m.sender_id = u.id 
    //         WHERE (m.sender_id = ? AND m.receiver_id = ?) OR (m.sender_id = ? AND m.receiver_id = ?) 
    //         ORDER BY m.created_at ASC";
    
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("iiii", $user_id, $receiver_id, $receiver_id, $user_id);
    
    // $stmt->execute();
    
    // $result = $stmt->get_result();
    
    // $messages = [];
    
    // while ($row = $result->fetch_assoc()) {
    //     $messages[] = [
    //         'fname' => htmlspecialchars($row['fname']),
    //         'message' => htmlspecialchars($row['message'])
    //     ];
    // }

    // echo json_encode($messages);
    
    $sql = "SELECT m.message, u.fname FROM messages m 
        JOIN users u ON m.sender_id = u.id 
        WHERE (m.sender_id = $user_id AND m.receiver_id = $receiver_id) 
        OR (m.sender_id = $receiver_id AND m.receiver_id = $user_id) 
        ORDER BY m.created_at ASC";

// Execute the query
$result = mysqli_query($conn, $sql);

// Initialize an array to hold messages
$messages = [];

// Fetch the results
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'fname' => htmlspecialchars($row['fname']),
        'message' => htmlspecialchars($row['message'])
    ];
}

// Output the messages as JSON
echo json_encode($messages);
}
?>