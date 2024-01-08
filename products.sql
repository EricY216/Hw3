CREATE TABLE `products` (
    `productID` INT AUTO_INCREMENT PRIMARY KEY,
    `merchantID` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `price` INT NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
