<?php 
    class CategoryController extends BaseController {

        private $categoryModel;

        public function __construct() {
            $this -> model('CategoryModel');
            $this -> categoryModel = new CategoryModel;
        }

        public function index() {
            $categories = $this -> categoryModel -> getAll();
            return $this -> view('admin.categories.index', [
                'categories' => $categories,
            ]);
        }

        public function create() {
            return $this -> view('admin.categories.create');
        }

        public function saveCreate() {

            if(isset($_POST['name'])) {
                $name = $_POST['name'];
                $data = [
                    'name' => "${name}"
                ];
            }
            $this -> categoryModel -> createCategory($data);
            header('location: ../category');
        }

        public function update() {
            $data = $this -> categoryModel -> getOne($_GET["id"]);
            return $this -> view('admin.categories.update', [
                'data' => $data
            ]);
        }

        public function saveUpdate() {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $data = [
                'name' => "${name}"
            ];

            $this -> categoryModel -> updateCategory($data, $id);
            header('location: ../category');
        }

        public function delete() {
            $id = $_GET['id'];
            $this -> categoryModel -> deleteCategory($id);
            header('location: ../category');
        }
    }
?>