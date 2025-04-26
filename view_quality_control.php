<?php
// view_quality_control.php
include('db_connection.php');

$sql = "SELECT * FROM Quality_Control_Inspection";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quality Control</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <table>
        <tr>
            <th>Batch ID</th>
            <th>Stage</th>
            <th>Inspection Results</th>
            <th>Check Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['batch_id']; ?></td>
            <td><?php echo $row['stage']; ?></td>
            <td><?php echo $row['inspection_result']; ?></td>
            <td><?php echo $row['check_date']; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>