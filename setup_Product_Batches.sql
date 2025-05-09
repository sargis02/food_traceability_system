CREATE TABLE Product_Batches (
    batch_id INT AUTO_INCREMENT PRIMARY KEY, 
    product_id INT NOT NULL,
    lot_number VARCHAR(255) NOT NULL,
    barcode VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id) ON DELETE CASCADE,
    CONSTRAINT unique_lot_number UNIQUE (lot_number),
    CONSTRAINT unique_barcode UNIQUE (barcode)
) ENGINE=InnoDB;