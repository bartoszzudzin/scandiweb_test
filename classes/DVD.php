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
         echo '<p>'.$this->price.'.00 $</p>';
         echo '<p>Size: '. $this->size.' MB</p>';
         echo '</div>';



    }
};


?>
