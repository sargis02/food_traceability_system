<?php
// Include the database connection
include('db_connection.php');

// product deletion
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM Products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// product addition
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $origin = $_POST['origin'];
    $variety = $_POST['variety'];
    $harvest_date = $_POST['harvest_date'];
    $certifications = $_POST['certifications'];

    $sql = "INSERT INTO Products (name, origin, variety, harvest_date, certifications) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $origin, $variety, $harvest_date, $certifications);
    $stmt->execute();

    
}

// Function to search products
function searchProducts($conn, $search) {
    $sql = "SELECT * FROM Products WHERE name LIKE ? OR origin LIKE ? OR variety LIKE ? ORDER BY id ASC";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$search%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    
    if ($stmt->execute()) {
        return $stmt->get_result();
    } else {
        // Handle query error
        echo "Error executing query: " . $stmt->error;
        return null;
    }
}


$search = isset($_GET['search']) ? $_GET['search'] : '';
$products = searchProducts($conn, $search);



// Include the HTML file for displaying the form and table
include('manage_products.html');
?>
