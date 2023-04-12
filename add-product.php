
<script type="text/javascript">
    function validateMyForm(){
        let isValid = true;
        if(document.product_form.sku.value == ""){
            alert("Please provide the sku value");
            isValid = false;
        }
        else if(document.product_form.name.value == ""){
            alert("Please provide the product name value");
            isValid = false;
        }
        else if(document.product_form.price.value == ""){
            alert("Please provide the price for the product");
            isValid = false;
        }
        else if(document.product_form.productType.value == ""){
            alert("Please select a product type");
            isValid = false;
        }
        return isValid;
    }
</script>

<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Product Add</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>    
    <div class="mainPage">
        <div id="pageContent">
            <form name="product_form" action="/" method="get" id="product_form"> 
                <div class='header'>
                    <p>Product Add</p>
                    <div class='buttons'>
                        <button id="Save" type="submit" name="submit" class="button save" onClick="validateMyForm()">Save</button>
                        <button class="button" onClick="window.location.href = '/'">CANCEL</button>
                    </div>
                </div>
                <div class="form">     

                        <label>SKU   
                        <input name="sku" type="text" id="sku" placeholder="Must be unique" required>
                        </label> 
  
                        <label>Name
                        <input name="name" type="text" id="name" required>
                        </label>
                        
                        <label>Price ($)
                        <input name="price" type="number" step="any" id="price" required>
                        </label>

                        <label>Type Switcher
                        <select name="productType" id="productType" required>
                            <option value="" disabled selected>Select</option>
                            <option value="DVD">DVD</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Book">Book</option>
                        </select>
                        </label>
                    
                    
                    <div id="DVD" class="not">

                        <label>Size (MB)
                        <input name="size" type="text" id="size">
                        </label>

                        <p>Please, provide size</p>

                    </div>

                    <div id="Furniture" class="not">
                        <label>Height (CM)
                        <input name="height" type="text" id="height">
                        </label>
                        <label>Width (CM)
                        <input name="width" type="text" id="width">
                        </label>
                        <label>Length (CM)
                        <input name="length" type="text" id="length">
                        </label>
                        <p>Please, provide dimensions</p>
                    </div>

                    <div id="Book" class="not">
                        <label>Weight (KG)
                        <input name="weight" type="text" id="weight">
                        </label>
                        <br />
                        <p>Please, provide weight</p>
                    </div>           
                </div>
            </form>
        </div>      
        <?php include("footer.php");?>
    </div>
    </body>
</html>



<script type="text/javascript">
    class ProductType
    {
        display(){
            return 0;
        }

        require(){
            return 0;
        }

    }

    function getOption(){

        let selectElement = document.querySelector('#productType');
        let value = selectElement.value;
        let allProductTypes = [];

        function catalog(myClasses){
            allProductTypes.push(myClasses);
        }

        catalog(class DVD extends ProductType {
        
            constructor(){
                super();
                this.display();
                this.require();
            }

            display(){
                return document.getElementById("DVD").classList.remove("not");
            }

            require(){
                document.getElementById('size').setAttribute('required', '');
            }

        });

        catalog(class Furniture extends ProductType {

            constructor(){
                super();
                this.display();
                this.require();
            }

            display(){
                return document.getElementById("Furniture").classList.remove("not");
            }

            require(){
                document.getElementById('height').setAttribute('required', '');
                document.getElementById('width').setAttribute('required', '');
                document.getElementById('length').setAttribute('required', '');
            }

        });

        catalog(class Book extends ProductType {

            constructor(){
                super();
                this.display();
                this.require();
            }

            display(){
                return document.getElementById("Book").classList.remove("not");
            }

            require(){
                document.getElementById('weight').setAttribute('required', '');
            }

        });

        document.getElementById("DVD").classList.add("not");
        document.getElementById('size').removeAttribute('required');
        
        document.getElementById("Furniture").classList.add("not");
        document.getElementById('height').removeAttribute('required');
        document.getElementById('width').removeAttribute('required');
        document.getElementById('length').removeAttribute('required');
        
        document.getElementById("Book").classList.add("not");
        document.getElementById('weight').removeAttribute('required');

        for(let i = 0; i < allProductTypes.length; i++){
            if(value == allProductTypes[i].name){
                return new allProductTypes[i];
            }  
        }
    }
    let productTypeElement = document.querySelector('#productType');
    productTypeElement.addEventListener("change", getOption);


</script>
