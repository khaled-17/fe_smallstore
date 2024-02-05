 <?php 
 
 
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

 


include("config.php");
include("inproduct.php");

 
 


// Example usage:
$servername = "localhost";
$username = "if0_35913531";
$password = "z5g0Ag4QCig";
$dbname = "if0_35913531_online";
 $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sku VARCHAR(255) UNIQUE,
  name VARCHAR(255),
  price VARCHAR(255),
  product_type VARCHAR(255),
  product_attribute VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
// echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}

 


  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents("php://input"));
 
 
var_dump("post method is call ? \n");
 
$product = createDVDObject($data->sku, $data->name, $data->price,$data->productType, $data->productAttributes);

$productManager = new ProductManager();

$productManager->addProduct($conn, $product);


  echo("----- in post product ----- ");
 var_dump($product);
 

 
  
}
elseif ($_GET['action'] === 'delete') {
    
    
    
     $productManager = new ProductManager();


    $productManager->deleteProduct($conn, $_GET['ids']);
   
     
   
      
 
}


elseif ($_GET['action'] === "get") {
  
 

  

     $productManager = new ProductManager("ddd");

 
 $allProducts = $productManager->getAllProducts($conn);
 echo json_encode($allProducts);
   
    
  }
  
  function createDVDObject($sku, $name, $price,$productType, $productAttributes) {
     var_dump("createDVDObject is call now \n");
    echo("\n-------------- \n");
    // var_dump($data);
    
    echo("\n-------------- \n");
    
    
    $productType = ucfirst(strtolower($productType));
    
    var_dump("productType :  ".$productType);
    
    $productClasses = [
      'Dvd' => Dvd::class,
      'Book' => Book::class,
      'Furniture' => Furniture::class,
  ];

  if (!isset($productClasses[$productType])) {
      throw new InvalidArgumentException("Invalid product type");
  }

  $productClass = $productClasses[$productType];
  var_dump("productClass :  ".$productClass);

    
    $product = new $productClass($sku, $name, $price, $productAttributes);

    var_dump($product);

 



    var_dump("createDVDObject is end  now \n");
    echo("\n-------------- \n");
    return $product;
  }
  


 
 
  
 




  
?>