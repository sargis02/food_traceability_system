CREATE TABLE Affected_Batches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    issue_description TEXT NOT NULL,
    distribution_point VARCHAR(255) NOT NULL,
    affected_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (batch_id) REFERENCES Product_Batches(batch_id) ON DELETE CASCADE
) ENGINE=InnoDB;
