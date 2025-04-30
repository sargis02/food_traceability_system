CREATE TABLE Temperature_Humidity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    temperature DECIMAL(5, 2) NOT NULL,
    humidity DECIMAL(5, 2) NOT NULL,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (batch_id) REFERENCES Product_Batches(batch_id) ON DELETE CASCADE
) ENGINE=InnoDB;
