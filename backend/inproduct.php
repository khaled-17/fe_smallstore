<?php

  abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;

     public function __construct($sku, $name, $price,$productType)
    {   
        echo "\n\n we creat Product abstractabstract 👽👾 opject $%##  \n";
        
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
      }

     abstract function getproductattribute() ;

    public function getSku()
    {
        return $this->sku;
    }

     public function getName()
    {
        return $this->name;
    }

     public function getPrice()
    {
        return $this->price;

        
    }
     public function getproductType()
    {
        return $this->productType;

        
    }
}

 class Book extends Product
{
    private $weightInKg;
    const productType = "Book";
      public function __construct($sku, $name, $price, $weightInKg)
    {
        parent::__construct($sku, $name, $price,self::productType);
        $this->weightInKg = $weightInKg->weight;
        // echo "\n\n we creat Book 🤖🤖🤖 opject $%##  \n";

 
    }

    public function getproductattribute()
    {
        return $this->weightInKg;
    }
}


// DVD class 
class DVD extends Product
{  
    
 
      private $sizeInMB;
       const productType = "DVD";

    public function __construct($sku, $name, $price, $sizeInMB)
    {                      
        parent::__construct($sku, $name, $price,self::productType);
        $this->sizeInMB = $sizeInMB->Size;
        // echo "\n\n we creat DVD 🤖🤖🤖 opject $%##  \n";
        
     }

     public function getproductattribute()
     {
         return $this->sizeInMB;
     }
     
}



 class Furniture extends Product
{
    private $dimensions;
    const productType = "Furniture";
    public function __construct($sku, $name, $price, $dimensions)
    {
        
        parent::__construct($sku, $name, $price,self::productType);
        
        // echo "\n\n we creat Furniture 🤖🤖🤖 opject $%##  \n";

        $this->dimensions = $dimensions->height."x".$dimensions->Width."x".$dimensions->length;
 
     }

     public function getproductattribute()
     {
         return $this->dimensions;
     }
     
}



?>