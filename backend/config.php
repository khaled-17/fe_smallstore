<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST,DELETE, OPTIONS");

 
 class ProductManager {



    public function __construct() {

       
        

 

    }
    // Add a product
    public function addProduct($conn, $newProduct) {
 

        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        // echo json_encode("conn conn conn");
        echo json_encode("\n addProduct puplic function  \n");
        // var_dump ($conn);
        // var_dump  ($newProduct->getSku());
        // var_dump  ($newProduct->getName());
        // var_dump  ($newProduct->getPrice());
        $prodtyoe=$newProduct->getproductType();
        var_dump ($prodtyoe);
        $productattribute=$newProduct->getproductattribute();
        // var_dump  ($newProduct->getproductattribute());
     $sql_insert_product = "INSERT INTO products (sku, name, price, product_type, product_attribute) 
                        VALUES ('" . $newProduct->getSku() . "','" . $newProduct->getName() . "', " . $newProduct->getPrice() . ", '" . "$prodtyoe" . "', '" . $productattribute . "')";
if ($conn->query($sql_insert_product) === TRUE) {
    echo "New record created successfully 😍🤑";
  } else {
    echo "Error 🥵😱 : <br>" . $conn->error;
  }

 

    
    }

 




     public function deleteProduct($conn, $IDS) {

         $sql_delete_product  = "DELETE FROM products WHERE id IN (" . implode(",", $IDS) . ")";
        if ($conn->query($sql_delete_product) === TRUE) {
                         echo json_encode(['message' => 'Items deleted successfully']);
                    } else {

              echo json_encode(['error' => 'Error deleting items: ' . $conn->error]);
                    }

    }

     public function getAllProducts($conn) {
        $sql_select_all = "SELECT * FROM products";
        $result = $conn->query($sql_select_all);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }
}






  

 
?>
