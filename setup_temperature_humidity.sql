CREATE TABLE Temperature_Humidity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (batch_id) REFERENCES Product_Batches(id) ON DELETE CASCADE,
    INDEX idx_batch_time (batch_id, timestamp)
) ENGINE=InnoDB;