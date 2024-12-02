<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM orders ORDER BY date DESC, id DESC";
$result = $mysqli->query($sql);

$data = array(); // Initialize an array to store table data

if ($result->num_rows > 0) {
    // Fetch rows as associative arrays
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


echo json_encode($data);