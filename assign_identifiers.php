<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $lot_number = $_POST['lot_number'];
    $barcode = $_POST['barcode'];

    // Insert lot number and barcode into Product_Batches table
    $sql = "INSERT INTO Product_Batches (product_id, lot_number, barcode) VALUES ('$product_id', '$lot_number', '$barcode')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Identifiers assigned successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>