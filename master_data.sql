CREATE TABLE requests (
    id INT AUTO_INCREMENT PRIMARY KEY,             -- Unique request ID
    requester_name VARCHAR(255) NOT NULL,         -- Name of the requester
    request_type ENUM('Type1', 'Type2', 'Type3') NOT NULL, -- Predefined request types
    request_number VARCHAR(50) UNIQUE NOT NULL,   -- Unique request number
    item_description TEXT,                        -- Description of the item
    request_description TEXT,                     -- Additional details about the request
    location_code VARCHAR(50) NOT NULL,           -- Location identifier
    quantity INT UNSIGNED NOT NULL DEFAULT 1,     -- Quantity, should be a positive number
    unit_of_measure VARCHAR(50) NOT NULL,         -- Unit of measure (e.g., kg, pcs, liters)
    expected_receipt_date DATE NOT NULL,          -- Expected arrival date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Auto-generated timestamp
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Auto-update timestamp
);