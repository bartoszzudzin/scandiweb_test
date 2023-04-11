<?php
require "scripts/connection.php";
include_once 'classes/Product.php';
include_once 'classes/Book.php';
include_once 'classes/DVD.php';
include_once 'classes/Furniture.php';

if(isset($_GET['sku'])){

    $sku = mysqli_real_escape_string($con, $_GET['sku']);
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $price = mysqli_real_escape_string($con, $_GET['price']);
    $productType = mysqli_real_escape_string($con, $_GET['productType']);
    $size = isset($_GET['size']) && !empty($_GET['size']) ? mysqli_real_escape_string($con, $_GET['size']) : 0;
    $height = isset($_GET['height']) && !empty($_GET['height']) ? mysqli_real_escape_string($con, $_GET['height']) : 0;
    $width = isset($_GET['width']) && !empty($_GET['width']) ? mysqli_real_escape_string($con, $_GET['width']) : 0;
    $length = isset($_GET['length']) && !empty($_GET['length']) ? mysqli_real_escape_string($con, $_GET['length']) : 0;
    $weight = isset($_GET['weight']) && !empty($_GET['weight']) ? mysqli_real_escape_string($con, $_GET['weight']) : 0;

    $class = new $productType();

    $class->addProduct($con, $sku, $name, $price, $productType, $size, $height, $width, $length, $weight);

}

?>
<?php

$children = array();

foreach(get_declared_classes() as $class ){
    if(is_subclass_of( $class, 'Product' )){
    $children[] = $class;
    }
}

?>

<script type="text/javascript">
    function redirectMe(){
        window.location = 'add-product.php';
    }
</script>

<?php 

if(isset($_POST["please_delete"])){ 
    $sku = null;
    if(isset($_POST['delete'])){
        foreach($_POST['delete'] as $SKU){        
             $con->query("DELETE FROM products WHERE sku='".$SKU."'");    
        }
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Products List</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
    <div class="mainPage">
        <div id="pageContent">
            <form method="post" action="">
                <div class='header'>
                    <p>Products List</p>
                    <div class='buttons'>
                        <button type="button" class="button" onClick="redirectMe()">ADD</button>                        
                        <input id="delete-product-btn" type="submit" value="MASS DELETE" name="please_delete" class="button delete">
                    </div>
                </div>
                <div class="list">  
                    <?php 
                        $ascorder = "SELECT * FROM products ORDER BY name ASC";
                        $sql = mysqli_query($con, $ascorder);
            
                        $productCount = mysqli_num_rows($sql);
                        if($productCount > 0){
                                while($row = mysqli_fetch_object($sql)){
                                    $key= array_search("$row->productType",$children);
                                    $ourNewProduct = new $children[$key]();
                                    $ourNewProduct->setValues("$row->sku","$row->name", "$row->price","$row->size", "$row->height", 
                                    "$row->width", "$row->length", "$row->weight");
                                    echo $ourNewProduct->getInfo();
                                }     
                        }
                    ?>
                </div>
            </form>
        </div>
       <?php include_once("footer.php");?>
       </div>
    </body>
</html>
