<?php

session_start();

$email = $_POST['email'];
$order_id = $_POST['order-id'];

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

$mail->Subject = "Your Order Has Been Shipped! - Frosty's Cones";


$mysqli = require __DIR__ . "/database.php";

$items = "";

$order_items_list = "SELECT * FROM order_items WHERE order_id='" . $order_id . "'";
$oil_result = $mysqli->query($order_items_list);
if ($oil_result->num_rows > 0) {
    // output data of each row
    while($row = $oil_result->fetch_assoc()) {
        $getItemID = "SELECT name FROM products WHERE id='" . $row['product_id'] . "'";
        $giid_result = $mysqli->query($getItemID);
        $rowx = $giid_result->fetch_row();
        $product = $rowx[0];

        $items = $items . "" . $product . " - quantity: " . $row['quantity'] . "\n";

    }
}




$line = "_________________________________________\n";



$body = "Your order of:\n" . $line . $items . $line . "\n...has been processed and shipped!\n\nYou should receive it shortly!\n\nThanks!\n-Frosty's Cones";


$mail->Body = $body;

$mail->send();


//update database:
$sql_complete_order = "UPDATE orders SET complete='1' WHERE id='" . $order_id . "'";
$delete_result = $mysqli->query($sql_complete_order);


header("Location: employee-home.php");

