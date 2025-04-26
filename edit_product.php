<?php
include('db_connection.php');

// Get the product ID 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the product details 
    $sql = "SELECT * FROM Products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the product exists
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Product not found.");
    }
} else {
    die("No product ID specified.");
}

// form submission when editing a product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {
    $name = $_POST['name'];
    $origin = $_POST['origin'];
    $variety = $_POST['variety'];
    $harvest_date = $_POST['harvest_date'];
    $certifications = $_POST['certifications'];

    // Update the product 
    $sql = "UPDATE Products SET name = ?, origin = ?, variety = ?, harvest_date = ?, certifications = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $origin, $variety, $harvest_date, $certifications, $id);
    $stmt->execute();

}

include('edit_product.html');
?>

