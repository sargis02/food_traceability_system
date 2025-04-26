<?php
// record_affected_batches.php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $distribution_point = $_POST['distribution_point'];
    $issue_description = $_POST['issue_description'];

    // Insert affected batch data into Affected_Batches table
    $sql = "INSERT INTO Affected_Batches (batch_id, distribution_point, issue_description) 
            VALUES ('$batch_id', '$distribution_point', '$issue_description')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Affected batch recorded successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
