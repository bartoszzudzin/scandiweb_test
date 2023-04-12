<?php

require "connection.php";

$sql = "CREATE TABLE products(
    `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(11,2) UNSIGNED NOT NULL,
  `productType` varchar(255) NOT NULL,
  `size` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `width` varchar(5) NOT NULL,
  `length` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL
    )";
    
if(mysqli_query($con, $sql)){
    echo "Table created!";
} else {
    echo "ERROR: Table cannot be created";
}

?>
