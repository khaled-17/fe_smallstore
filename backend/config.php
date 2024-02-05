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

    // return $conn->query($sql_insert_product);


    
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







// class Database
// {
//     private $conn;

//     public function __construct($servername, $username, $password, $dbname)
//     {
//         // echo"\n we conect \n";
//         $this->conn = new mysqli($servername, $username, $password, $dbname);

//         if ($this->conn->connect_error) {
//             die("Connection failed: " . $this->conn->connect_error);
//         }
//     }

//     public function createProductTable()
//     {
//         $sql = "CREATE TABLE IF NOT EXISTS products (
//             id INT AUTO_INCREMENT PRIMARY KEY,
//             sku VARCHAR(255) UNIQUE,
//             name VARCHAR(255),
//             price DECIMAL(10, 2),
//             product_type VARCHAR(255),
//             product_attribute VARCHAR(255)
//         )";

//         if ($this->conn->query($sql) === TRUE) {
//             // echo "\n Table created successfully \n";
//             // echo json_encode("Table created successfully \n"); // تحويل النتيجة إلى JSON

//         } else {
//             echo "Error creating table: " . $this->conn->error;
//         }
//     }

 
//    // Add a product
//    public function addProduct($conn, $sku, $name, $price, $product_type, $product_attribute) {
//     $sql_insert_product = "INSERT INTO products (sku, name, price, product_type, product_attribute) 
//                            VALUES ('$sku', '$name', '$price', '$product_type', '$product_attribute')";

//     return $conn->query($sql_insert_product);
// }

//     public function getAllProd (){


//         $sql = "SELECT * FROM products";
//         $result = $this->conn->query($sql);
    
//         if ($result) {
//             $data = array();
//             while ($row = $result->fetch_assoc()) {
//                 $data[] = $row;
//             }
//             echo json_encode($data); // تحويل النتيجة إلى JSON
//         } else {
//             echo "Error: " . $this->conn->error;
//         }

//     }
//     public function DeleteProd ($IDS){



 
//         // قم بتحضير استعلام DELETE لحذف السجلات التي تتوافق مع الـ ids المحددة
//         $sql = "DELETE FROM products WHERE id IN (" . implode(",", $IDS) . ")";
    
//         // قم بتنفيذ الاستعلام
//         if ($this->conn->query($sql) === TRUE) {
//             // إرسال رد بنجاح
//             echo json_encode(['message' => 'Items deleted successfully']);
//         } else {
//             // إرسال رد بخطأ
//             http_response_code(500);
//             echo json_encode(['error' => 'Error deleting items: ' . $this->conn->error]);
//         }

        
//             //  echo json_encode($IDS); // تحويل النتيجة إلى JSON
         

//     }

//     public function closeConnection()
//     {
//         $this->conn->close();
//     }
// }

  

 
?>
