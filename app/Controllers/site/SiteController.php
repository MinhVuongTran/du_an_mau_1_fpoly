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
            $products = $this -> productModel -> getAll();
            $data = $this -> pagination("products", $products, 9, $this -> productModel);
            $productPagination = $data[0];
            $numOfPage = $data[1];
            $productsView = $this -> productModel -> getProductTopView();
            $this -> view('site.index', [
                'categories' => $categories,
                'products' => $productPagination,
                'numOfPage' => $numOfPage,
                'productsView' => $productsView
            ]);
        }
    }
?>