<?php 
    class ProductController extends BaseController {

        private $productModel;
        private $categoryModel;

        public function __construct() {
            $this -> model('ProductModel');
            $this -> model('CategoryModel');
            $this -> productModel = new ProductModel;
            $this -> categoryModel = new CategoryModel;
        }

        public function index() {            
            if (isset($_GET["filter"])) {
                $category = $_GET["filter"];
                $products = $this -> productModel -> getAll($category);
            } else {
                $products = $this -> productModel -> getAll();
            }
            $categories = $this -> categoryModel -> getAll();
            
            return $this -> view('admin.products.index', [
                'products' => $products,
                'categories' => $categories,
            ]); 
        }

        public function create() {
            $categories = $this -> categoryModel -> getAll();
            return $this -> view('admin.products.create', [
                'categories' => $categories,
            ]);
        }

        public function saveCreate() {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $discount = $_POST['discount'];

            $file = $_FILES['image'];
            $image = "./uploads/product/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $image = "." . $image;

            $description = $_POST['description'];
            $received_date = $_POST['received_date'];
            $special = $_POST['special'];
            $category_id = $_POST['category_id'];
            $data = [
                'name' => "${name}",
                'price' => "${price}",
                'quantity' => "${quantity}",
                'discount' => "${discount}",
                'image' => "${image}",
                'description' => "${description}",
                'received_date' => "${received_date}",
                'special' => "${special}",
                'category_id' => "${category_id}",
            ];
            $this -> productModel -> createProduct($data);
            header('location: ../product');
        }

        public function update() {
            $data = $this -> productModel -> getOne($_GET["id"]);
            $categories = $this -> categoryModel -> getAll();
            return $this -> view('admin.products.update', [
                'data' => $data,
                'categories' => $categories,
            ]);
        }

        public function saveUpdate() {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $discount = $_POST['discount'];
            
            $file = $_FILES['image'];
            if($file['size'] == 0) {
                $data = $this -> productModel -> getOne($_POST["id"]);
                $image = $data['image'];
            } else {
                $image = "./uploads/product/" . $file['name'];
                move_uploaded_file($file['tmp_name'], $image);
                $image = "." . $image;
            }

            $description = $_POST['description'];
            $received_date = $_POST['received_date'];
            $special = $_POST['special'];
            $category_id = $_POST['category_id'];
            $data = [
                'name' => "${name}",
                'price' => "${price}",
                'quantity' => "${quantity}",
                'discount' => "${discount}",
                'image' => "${image}",
                'description' => "${description}",
                'received_date' => "${received_date}",
                'special' => "${special}",
                'category_id' => "${category_id}",
            ];
            $id = $_POST['id'];
            $this -> productModel -> updateProduct($data, $id);
            header('location: ../product');
        }

        public function delete() {
            if(isset($_POST["action"])) {
                $action = $_POST["action"];
                switch ($action) {
                    case 'delete':
                        $id = $_POST['productIds'];
                        $this -> productModel -> deleteProduct($id);
                        header('location: ../product');
                        break;
                    default:
                        break;
                }
            } else {
                if(isset($_GET["id"])) {
                    $id = $_GET['id'];
                    $this -> productModel -> deleteProduct($id);
                    header('location: ../product');
                }
            }
        }
    }
?>