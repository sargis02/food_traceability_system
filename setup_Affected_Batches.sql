CREATE TABLE Affected_Batches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    distribution_point VARCHAR(255) NOT NULL,
    issue_description TEXT NOT NULL,
    affected_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('reported', 'investigating', 'resolved') DEFAULT 'reported',
    FOREIGN KEY (batch_id) REFERENCES Product_Batches(id) ON DELETE CASCADE,
    INDEX idx_batch_status (batch_id, status)
) ENGINE=InnoDB;
