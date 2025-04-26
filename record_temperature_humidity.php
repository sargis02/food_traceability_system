<?php
// record_temperature_humidity.php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];

    // Insert temperature and humidity into Temperature_Humidity table
    $sql = "INSERT INTO Temperature_Humidity (batch_id, temperature, humidity) 
            VALUES ('$batch_id', '$temperature', '$humidity')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Temperature and humidity data recorded successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
