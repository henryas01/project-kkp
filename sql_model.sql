CREATE TABLE
    requests (
        id INT AUTO_INCREMENT PRIMARY KEY, -- Unique request ID
        requester_name VARCHAR(255) NOT NULL, -- Name of the requester
        request_type ENUM ('Type1', 'Type2', 'Type3') NOT NULL, -- Predefined request types
        request_number VARCHAR(50) UNIQUE NOT NULL, -- Unique request number
        item_description TEXT, -- Description of the item
        request_description TEXT, -- Additional details about the request
        location_code VARCHAR(50) NOT NULL, -- Location identifier
        quantity INT UNSIGNED NOT NULL DEFAULT 1, -- Quantity, should be a positive number
        unit_of_measure VARCHAR(50) NOT NULL, -- Unit of measure (e.g., kg, pcs, liters)
        expected_receipt_date DATE NOT NULL, -- Expected arrival date
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Auto-generated timestamp
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Auto-update timestamp
    );

-- master_data tabel versi 2
CREATE TABLE
    `project_kkp`.`master_data` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `material` VARCHAR(255) NOT NULL,
        `kategory` VARCHAR(255) NOT NULL,
        `tebal` INT NOT NULL,
        `lebar` INT NOT NULL,
        `berat_jenis` INT NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- Insert data ke tabel master_data
INSERT INTO
    `master_data` (
        `id`,
        `material`,
        `kategory`,
        `tebal`,
        `lebar`,
        `berat_jenis`
    )
VALUES
    (
        NULL,
        'PET PLAIN 12 MIC X 1100 MM',
        'PrintBased',
        '12',
        '1100',
        '142'
    );

--  purchase_request tabel --
CREATE TABLE
    `project_kkp`.`purchase_request` (
        `id` BIGINT NOT NULL AUTO_INCREMENT,
        `purchase_request_number` VARCHAR(255) NOT NULL,
        `user_ID` BIGINT NOT NULL,
        `document_date` DATETIME NOT NULL,
        `status` BOOLEAN NOT NULL,
        `material` VARCHAR(255) NOT NULL,
        `kategory` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `qty` INT NOT NULL,
        `uom` VARCHAR(255) NOT NULL,
        `approved_user` VARCHAR(255) NOT NULL,
        `approved_manager` VARCHAR(255) NOT NULL,
        `acknowledge` VARCHAR(255) NOT NULL,
        `created_at` TIMESTAMP NOT NULL,
        `updated_at` TIMESTAMP NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;