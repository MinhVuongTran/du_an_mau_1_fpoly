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
            $relevantProducts = $this -> productModel -> getAll($product['category_id'], $id, true);

            $data = $this -> productModel -> pagination("products", $relevantProducts, 5, $product['category_id'], $id);
            $relevantProductsPagination = $data[0];
            $numOfPage = $data[1];
            $this -> productModel -> updateProduct([
                "view" => $product['view'] +1,
            ],$id);
            return $this -> view('site.layouts.products.detail', [
                'product' => $product,
                'comments' => $comments,
                'relevantProductsPagination' => $relevantProductsPagination,
                'numOfPage' => $numOfPage
            ]);
        }

        public function addToCart() {
            if(!isset($_SESSION["auth"])) {
                header("location: ../auth");
                die;
            }
            if(isset($_GET["product_id"])) {
                $id = $_GET["product_id"];
                $auth = $_SESSION["auth"];
                $products = [$this -> productModel -> getOne($id)];
                $quantity = $_POST["quantity"];
                array_push($products[0], $products[0]['quantity'] = $quantity);
                $this -> view("site.layouts.carts.checkout", [
                    'auth' => $auth,
                    "products" => $products
                ]);
            } else {
                $product_id = $_GET["id"];
                $user_id = $_SESSION['auth']['id'];
                $data = $this -> cartModel -> getDataFromCart($user_id);
                $quantity = $_POST["quantity"];

                // check data from cart
                if(count($data) == 0) {
                    $data = $this -> productModel -> getOne($product_id);
                    $sql = "SELECT * from carts_detail where user_id = ${user_id}";
                    $cart_detail_id = $this -> productModel -> query_one($sql)['id'];
                    $data['cart_detail_id'] = $cart_detail_id;
                    $data = [$data];
                }
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