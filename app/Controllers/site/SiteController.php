<?php
    class SiteController extends BaseController {

        private $productModel;
        private $categoryModel;
        
        public function __construct() {

            $this -> model('ProductModel');
            $this -> productModel = new ProductModel;

            $this -> model('CategoryModel');
            $this -> categoryModel = new CategoryModel;
        }

        public function index() {
            $categories = $this -> categoryModel -> getAll();
            $productsView = $this -> productModel -> getProductTopView();
            if(isset($_GET["search"])) {
                $keyword = $_GET["search"];
                $products = $this -> productModel -> getProductsFromSearch($keyword);
                $this -> view('site.index', [
                    'categories' => $categories,
                    'products' => $products,
                    'productsView' => $productsView
                ]);
            } else {
                $products = $this -> productModel -> getAll();
                $data = $this -> productModel -> pagination("products", $products, 9);
                $productPagination = $data[0];
                $numOfPage = $data[1];
                $this -> view('site.index', [
                    'categories' => $categories,
                    'products' => $productPagination,
                    'numOfPage' => $numOfPage,
                    'productsView' => $productsView
                ]);
            }
        }
    }
?>