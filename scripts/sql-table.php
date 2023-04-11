<?php

require "connection.php";

$sql = "CREATE TABLE `products` (
    `sku` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `price` decimal(11,2) UNSIGNED NOT NULL,
    `productType` varchar(255) NOT NULL,
    `size` decimal(11,2) UNSIGNED DEFAULT NULL,
    `height` decimal(11,2) UNSIGNED DEFAULT NULL,
    `width` decimal(11,2) UNSIGNED DEFAULT NULL,
    `length` decimal(11,2) UNSIGNED DEFAULT NULL,
    `weight` decimal(11,2) UNSIGNED DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    
if(mysqli_query($con, $sql)){
    echo "Table created!";
} else {
    echo "ERROR: Table cannot be created";
}

?>
