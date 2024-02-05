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

 


 
//  $database = new Database();

// $database->createProductTable();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents("php://input"));
 
 
var_dump("post method is call ? \n");
// // استخدام الدالة لإنشاء الكائن

$product = createDVDObject($data->sku, $data->name, $data->price,$data->productType, $data->productAttributes);

$productManager = new ProductManager();

$productManager->addProduct($conn, $product);


// طباعة الكائن
 echo("----- in post product ----- ");
 var_dump($product);
 




// echo json_encode($data) ;   
// echo json_encode($newProduct) ;   
  

// $come=$productManager->addProduct($conn, $newProduct);

// echo json_encode($productManager) ;   
// echo json_encode($come) ;   

  
}
elseif ($_GET['action'] === 'delete') {
    
    
    
     $productManager = new ProductManager();


    $productManager->deleteProduct($conn, $_GET['ids']);
   
     
   
      
 
}


elseif ($_GET['action'] === "get") {
  
  // echo("\n action:get.jd \n") ;


  

     $productManager = new ProductManager("ddd");

 
 $allProducts = $productManager->getAllProducts($conn);
 echo json_encode($allProducts);
   
    
  }
  
  function createDVDObject($sku, $name, $price,$productType, $productAttributes) {
    // إنشاء كائن DVD
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

    // // // // إعادة الكائن




    var_dump("createDVDObject is end  now \n");
    echo("\n-------------- \n");
    return $product;
  }
  


function createProduct($data)
{var_dump("product");
  var_dump("product");
  var_dump("product");
  var_dump("product");
  var_dump("product");
//   var_dump("product");
//   echo("\n-------------- \n");
//   // var_dump($data);
 
//  echo("\n-------------- \n");

 
//   $productAttributes=$data->productAttributes;
//    $productType = ucfirst(strtolower($data->productType));
  
//     var_dump ($productType);


     $productClasses = [
        'Dvd' => Dvd::class,
        'Book' => Book::class,
        'Furniture' => Furniture::class,
    ];

    if (!isset($productClasses[$productType])) {
        throw new InvalidArgumentException("Invalid product type");
    }

    $productClass = $productClasses[$productType];
    $product = new $productClass($data->sku,$data->name, $data->price,$productAttributes);
 


  
 return $product;

 
 //   echo "\n createProduct run \n";
//   $productType = ucfirst(strtolower($data->productType));
//   echo "\n \n \n data    is : ..\n\n";
//   echo json_encode($data) ;

//      $productClasses = [
//         'Dvd' => Dvd::class,
//         'Book' => Book::class,
//         'Furniture' => Furniture::class,
//     ];

//     if (!isset($productClasses[$productType])) {
//         throw new InvalidArgumentException("Invalid product type");
//     }

//     $productClass = $productClasses[$productType];
 

//     echo "\n \n \n productAttribute    is : ..\n\n";
//     echo json_encode($data->productAttributes) ;
//   echo("\n -------------- \n");
  
// $productAttributes=$data->productAttributes;

    //  $product = new DVD($data->sku, $data->name, $data->price, $productAttributes);

    // //  echo("------XXX--------");
    // //  echo json_encode($product);
    // echo "\n createProduct end :) \n\n\n\n";

    // var_dump ($product);


    // return $product;
}

 
  
 




  
?>