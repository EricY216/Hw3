CREATE TABLE `orders` (
    `orderID` INT AUTO_INCREMENT PRIMARY KEY,
    `merchantID` INT NOT NULL,
    `orderStatus` INT NOT NULL,
    `rating` INT NOT NULL,
    `customerID`INT NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
