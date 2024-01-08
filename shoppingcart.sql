CREATE TABLE `shoppingcart` (
    
    `productID` VARCHAR(255) NOT NULL,
    `customerID` VARCHAR(255) NOT NULL,
    `quantity` VARCHAR(255) NOT NULL,
    `cartID` INT AUTO_INCREMENT PRIMARY KEY
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
