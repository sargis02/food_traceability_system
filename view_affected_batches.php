<?php

include('db_connection.php');

$sql = "SELECT * FROM Affected_Batches";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Affected Batches</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div class="main-content">
    <h2>Affected Product Batches</h2>
        <table>
            <thead>
                <tr>
                    <th>Batch ID</th>
                    <th>Distribution Point</th>
                    <th>Issue Description</th>
                    <th>Affected Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['batch_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['distribution_point']); ?></td>
                    <td><?php echo htmlspecialchars($row['issue_description']); ?></td>
                    <td><?php echo htmlspecialchars($row['affected_at']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>