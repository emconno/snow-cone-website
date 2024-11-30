<?php
session_start();
// Set the response header to JSON
header('Content-Type: application/json');

// Read the raw POST data
$input = file_get_contents('php://input');

// Decode the JSON input
$data = json_decode($input, true);

if (isset($data['array']) && is_array($data['array'])) {
    // Access the JavaScript array as a PHP variable
    $_SESSION['cart'] = $data['array'];


    // Respond to the client
    echo json_encode(['success' => true, 'receivedArray' => $_SESSION['cart']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data received.']);
}
?>
