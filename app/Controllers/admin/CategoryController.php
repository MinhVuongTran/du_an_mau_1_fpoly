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
        
        public function statistical() {
            $statisticals = $this -> categoryModel -> statistical();
            return $this -> view('admin.statisticals.index', [
                'statisticals' => $statisticals,
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
            $check = $this -> categoryModel -> checkExist("categories", "name", $name);

            // Check exist
            if($check == "") {
                $this -> categoryModel -> createCategory($data);
                header('location: ../category');
            } else {
                header("location: ../category/create?${check}");
            }
        }

        public function update() {
            if(isset($_GET["id"])) {
                $data = $this -> categoryModel -> getOne($_GET["id"]);
            }
            return $this -> view('admin.categories.update', [
                'data' => $data
            ]);
        }

        public function saveUpdate() {
            if(isset($_POST["id"]) && isset($_POST["name"])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $data = [
                    'name' => "${name}"
                ];

                $check = $this -> categoryModel -> checkExist("categories", "name", $name, $id);
            }
            // Check exist
            if($check == "") {
                $this -> categoryModel -> updateCategory($data, $id);
                header('location: ../category');
            } else {
                header("location: ../category/update?id=${id}&${check}");
            }
        }

        public function delete() {
            if(isset($_POST["action"])) {
                $action = $_POST["action"];
                switch ($action) {
                    case 'delete':
                        $ids = $_POST['categoryIds'];
                        $this -> categoryModel -> deleteCategory($ids);
                        header('location: ../category');
                        break;
                    default:
                        break;
                }
            } else {
                if(isset($_GET["id"])) {
                    $id = $_GET['id'];
                    $this -> categoryModel -> deleteCategory($id);
                    header('location: ../category');
                }
            }
            
        }
    }
?>