<?php

header('Content-Type: application/json'); // Return JSON response for the fetch API

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // get data from post request
    $item_name = $_POST['item_name'] ?? '';
    $quantity = $_POST['quantity'] ?? 0;
    $price = $_POST['price'] ?? 0;
    $discount_amount = $_POST['discount_amount'] ?? 0;
    $discounted_amount = $_POST['discounted_amount'] ?? 0;
    
    $total_quantity = $_POST['total_quantity'] ?? 0;
    $total_discount_given = $_POST['total_disc_given'] ?? 0; 
    $total_discounted_given = $_POST['total_discED_amount'] ?? 0; 
    
    $cash_given = $_POST['cash_given'] ?? 0;
    $change = $_POST['change'] ?? 0;
    $discount_option = $_POST['discount_option'] ?? 'none';

    // connect to Database
    include '../db_connection.php';
    $conn = OpenCon();

    $sql = "INSERT INTO salestbl (
        item_name, 
        quantity, 
        price, 
        discount_amount, 
        discounted_amount, 
        total_quantity, 
        total_discount_given, 
        total_discounted_amount, 
        cash_given, 
        customer_change, 
        discount_option
    ) VALUES (
        '$item_name', 
        '$quantity', 
        '$price', 
        '$discount_amount', 
        '$discounted_amount', 
        '$total_quantity', 
        '$total_discount_given', 
        '$total_discounted_given', 
        '$cash_given', 
        '$change', 
        '$discount_option'
    )";

    // execute now
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['ok' => true, 'message' => 'New record created successfully']);
    } else {
        echo json_encode(['ok' => false, 'error' => $conn->error]);
    }

    CloseCon($conn);
}
?>
