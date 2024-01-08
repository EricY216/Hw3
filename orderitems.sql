CREATE TABLE `orderitems` (
    `productID` INT AUTO_INCREMENT PRIMARY KEY,
    `customerID` VARCHAR(255) NOT NULL,
    `quantity` VARCHAR(255) NOT NULL,
    `orderID` INT NOT NULL,
    `orderItemID`INT NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
