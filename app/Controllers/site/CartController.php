<?php
    class CartController extends BaseController {

        private $cartModel;
        private $productModel;
        
        public function __construct() {

            $this -> model('CartModel');
            $this -> model('ProductModel');
            $this -> cartModel = new CartModel;
            $this -> productModel = new ProductModel;
        }

        public function index() {
            $carts = $this -> cartModel -> getDataFromCart($_SESSION["auth"]['id']);
            $products = $this -> productModel -> getAll();
            $this -> view("site.layouts.carts.index", [
                "carts" => $carts,
                "products" => $products,
            ]);
        }

        public function delete() {
            $product_id = $_GET["id"];
            $this -> cartModel -> deleteDataFromCart($_SESSION["auth"]['id'], $product_id);
            header("location: ../cart");
        }

        public function checkout() {
            if(isset($_POST["action"])) {
                $action = $_POST["action"];
                switch ($action) {
                    case 'delete':
                        break;
                    case 'buy':
                        if(isset($_SESSION["auth"])) {
                            $product_ids = $_POST["cartIds"];
                            $auth = $_SESSION["auth"];
                            $products = $this -> cartModel -> getDataFromCart($auth['id'], $product_ids);
                            $this -> view("site.layouts.carts.checkout", [
                                'auth' => $auth,
                                'products' => $products,
                            ]);
                        } else {
                            header('../../auth');
                        }
                        break;
                    default:
                        break;
                }
            } else {
                if(isset($_SESSION["auth"])) {
                    $product_id = $_GET["id"];
                    $auth = $_SESSION["auth"];
                    $products = $this -> cartModel -> getDataFromCart($auth['id'], [$product_id]);
                    $this -> view("site.layouts.carts.checkout", [
                        'auth' => $auth,
                        'products' => $products,
                    ]);
                } else {
                    header('../../auth');
                }
            }
        }
    }
?>