<?php 
    class ProductController extends BaseController {
        private $productModel;
        private $categoryModel;
        private $cartModel;
        private $commentModel;

        public function __construct() {
            $this -> model('ProductModel');
            $this -> model('CategoryModel');
            $this -> model('cartModel');
            $this -> model('commentModel');
            $this -> productModel = new ProductModel;
            $this -> categoryModel = new CategoryModel;
            $this -> cartModel = new cartModel;
            $this -> commentModel = new commentModel;
        }

        public function index() {            
            $products = $this -> productModel -> getAll();
            
            
            return $this -> view('site.layouts.products.index', [
                'products' => $products,
            ]); 
        }

        public function detail() {
            $id = $_GET["id"];
            $product = $this -> productModel -> getOne($id);
            $comments = $this -> commentModel -> getComments($id);
            $this -> productModel -> updateProduct([
                "view" => $product['view'] +1,
            ],$id);
            return $this -> view('site.layouts.products.detail', [
                'product' => $product,
                'comments' => $comments
            ]);
        }

        public function addToCart() {
            $product_id = $_GET["id"];
            echo "<pre>";
            $data = $this -> cartModel -> getDataFromCart($_SESSION["auth"]['id']);
            $quantity = $_POST["quantity"];
            foreach ($data as $item) {
                if($product_id == $item['product_id']){
                    $this -> cartModel -> updateQuantity($product_id, $_SESSION["auth"]['id'], $item['quantity'], $quantity);
                    header("location: ../cart");
                    die;
                }
            }

            $value = [
                'cart_detail_id' => $data[0]['cart_detail_id'],
                'product_id' => $product_id,
                'quantity' => $quantity
            ];

            $this -> cartModel -> addDataToCart($value);
            header("location: ../cart");
        }

        public function addComment() {
            $product_id = $_GET["id"];
            $content = $_POST["content"];
            $user_id = $_SESSION["auth"]['id'];
            $date = date("Y-m-d H:i:s");
            $data = [
                'content' => $content,
                'product_id' => $product_id,
                'user_id' => $user_id,
                'date' => $date
            ];

            $this -> commentModel -> addComment($data);
            header("location: ../product/detail?id=${product_id}");
        }
    }
?>