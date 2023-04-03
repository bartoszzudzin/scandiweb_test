<?php

require "connection.php";

$sql = "CREATE TABLE products(
    sku varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    price int(11) unsigned NOT NULL,
    productType varchar(255) NOT NULL,
    size int(11) unsigned,
    height int(11) unsigned,
    width int(11) unsigned,
    length int(11) unsigned,
    weight int(11) unsigned
    )";
    
if(mysqli_query($con, $sql)){
    echo "Table created!";
} else {
    echo "ERROR: Table cannot be created";
}

?>
