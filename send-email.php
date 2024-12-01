<?php
session_start();

$email = $_POST['email'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "frostyscones@gmail.com";
$mail->Password = "ytmpqsmxyrcabmcd";

$mail->setFrom("frostyscones@gmail.com", "Frosty's Cones");
$mail->addAddress($email);

$mail->Subject = "Order Confirmation - Frosty's Cones";

$line = "_________________________________________\n";
$items = "";
for ($i = 0; $i < count($_SESSION['cart']); $i++) {
    $items = $items . $_SESSION['cart'][$i]['name'] . " - quantity: " . $_SESSION['cart'][$i]['quantity'] . "\n";
}

$body = "Your order of:\n" . $line . $items . $line . "\n...has been received!\n\nYou will be notified when your order is out for delivery!\n\nThanks!\n-Frosty's Cones";


$mail->Body = $body;

$mail->send();


//update database:
$mysqli = require __DIR__ . "/database.php";

$sql_order = "INSERT INTO orders (date, email) VALUES (CURDATE(), '" . $email . "')";
$order_result = $mysqli->query($sql_order);

$sql_orderID = "SELECT MAX(id) FROM orders WHERE email='" . $email . "'";
$orderID_result = $mysqli->query($sql_orderID);
$row = $orderID_result->fetch_row();
$orderID = $row[0];


for ($i = 0; $i < count($_SESSION['cart']); $i++) {
    $cartName = $_SESSION['cart'][$i]['name'];
    $sql = "SELECT quantity FROM products WHERE name='" . $cartName . "'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $newQuantity = $row['quantity'] - $_SESSION['cart'][$i]['quantity'];
            $sql_update = "UPDATE products SET quantity=" . $newQuantity . " WHERE name='" . $cartName . "'";
            $update_result = $mysqli->query($sql_update);
        }
    }

    $sql_productID = "SELECT id FROM products WHERE name='" . $cartName . "'";
    $productID_result = $mysqli->query($sql_productID);
    $product_row = $productID_result->fetch_row();
    $productID = $product_row[0];

    $sql_orderItem = "INSERT INTO order_items VALUES ('" . $orderID . "', '" . $productID . "', '" . $_SESSION['cart'][$i]['quantity'] . "')";
    $orderItem_result = $mysqli->query($sql_orderItem);
}



$_SESSION['cart'] = [];

header("Location: sent.html");

