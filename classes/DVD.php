<?php

class DVD extends Product{
    
    public function setValues($sku, $name, $price, $size, $height, $width, $length, $weight){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }

    public function getInfo(){
         echo '<div class="productElement">';
         echo '<input class="delete-checkbox" type="checkbox" name="delete[]" value='.$this->sku.'>';
         echo '<p>'.$this->sku.'</p>';
         echo '<p>'. $this->name.'</p>';
         echo '<p>'.$this->price.'$</p>';
         echo '<p>Size: '. $this->size.' MB</p>';
         echo '</div>';
    }

    public function addProduct($con, $sku, $name, $price, $productType, $size, $height, $width, $length, $weight)
    {
        if(isset($_GET['sku'])){
            $sql = mysqli_query($con, "SELECT sku FROM products WHERE sku='$sku'LIMIT 1");     
            $skuMatch = mysqli_num_rows($sql);
            if($skuMatch > 0){
                echo 'SKU is already in use, try another one. <a href="add-product.php">Go back</a>';
            }
            else{
                $sql = mysqli_query($con, "INSERT INTO products(sku, name, price, productType, size, height, width, length, weight) 
                VALUES('$sku', '$name', '$price', '$productType', '$size', '$height', '$width', '$length', '$weight')") or die (mysqli_error($con));
                header("Location: index.php");
                exit();
            }
        
        }
    }
};


?>
