<?php
// record_quality_control.php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $stage = $_POST['stage'];
    $inspection_result = $_POST['inspection_result'];

    // Insert inspection data into Quality_Control_Inspection table
    $sql = "INSERT INTO Quality_Control_Inspection (batch_id, stage, inspection_result) 
            VALUES ('$batch_id', '$stage', '$inspection_result')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Inspection results recorded successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>