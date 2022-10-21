<?php 
    class CategoryController extends BaseController {

        private $categoryModel;
        private $productModel;

        public function __construct() {
            $this -> model('CategoryModel');
            $this -> model('ProductModel');
            $this -> categoryModel = new CategoryModel;
            $this -> productModel = new ProductModel;
        }

        public function index() {
            $categories = $this -> categoryModel -> getAll();
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $products = $this -> productModel -> getAll($id);
                $data = $this -> productModel -> pagination("products", $products, 10, $id);
            } else {
                $products = $this -> productModel -> getAll();
                $data = $this -> productModel -> pagination("products", $products, 10);
            }

            $productPagination = $data[0];
            $numOfPage = $data[1];

            return $this -> view('site.layouts.categories.index', [
                'categories' => $categories,
                'products' => $productPagination,
                'numOfPage' => $numOfPage,
            ]);
        }

    }
?>