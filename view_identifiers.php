<?php
include('db_connection.php');

$sql = "SELECT * FROM Product_Batches";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assign Identifiers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <table>
        <tr>
            <th>Product ID</th>
            <th>Lot Number</th>
            <th>Barcode</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['lot_number']; ?></td>
            <td><?php echo $row['barcode']; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
