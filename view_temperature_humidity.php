<?php
// view_temperature_humidity.php
include('db_connection.php');


$sql = "SELECT * FROM Temperature_Humidity ORDER BY recorded_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Recorded Temperature and Humidity</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Recorded Temperature and Humidity Data</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Batch ID</th>
                        <th>Temperature (°C)</th>
                        <th>Humidity (%)</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['batch_id']); ?></td>
                        <td><?php echo number_format($row['temperature'], 2); ?></td>
                        <td><?php echo number_format($row['humidity'], 2); ?></td>
                        <td><?php echo htmlspecialchars($row['recorded_at']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>