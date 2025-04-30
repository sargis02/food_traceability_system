CREATE TABLE Quality_Control_Inspection (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    stage VARCHAR(255) NOT NULL,
    inspection_result TEXT NOT NULL,
    check_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (batch_id) REFERENCES Product_Batches(batch_id) ON DELETE CASCADE
) ENGINE=InnoDB;
