<?php 
    class UserController extends BaseController {

        private $userModel;

        public function __construct() {
            $this -> model('UserModel');
            $this -> userModel = new UserModel;
        }

        public function index() {
            $users = $this -> userModel -> getAll();
            return $this -> view('admin.users.index', [
                'users' => $users,
            ]);
        }

        public function create() {
            return $this -> view('admin.users.create');
        }

        public function saveCreate() {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $file = $_FILES['image'];
            $image = "./uploads/user/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $image = "." . $image;
            
            $status = $_POST['status'];
            $role = $_POST['role'];
            $data = [
                'firstName' => "${firstName}",
                'lastName' => "${lastName}",
                'address' => "${address}",
                'phone' => "${phone}",
                'email' => "${email}",
                'password' => "${password}",
                'image' => "${image}",
                'status' => "${status}",
                'role' => "${role}"
            ];
            $check = $this -> userModel -> checkExist("users", "email", $email);
            
            // Check exist
            if($check == "") {
                $this -> userModel -> createUser($data);
                header('location: ../user');
            } else {
                header("location: ../user/create?${check}");
            }
        }

        public function update() {
            $data = $this -> userModel -> getOne($_GET["id"]);
            return $this -> view('admin.users.update', [
                'data' => $data
            ]);
        }

        public function saveUpdate() {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $file = $_FILES['image'];
            if($file['size'] == 0) {
                $data = $this -> userModel -> getOne($_POST["id"]);
                $image = $data['image'];
            } else {
                $image = "./uploads/user/" . $file['name'];
                move_uploaded_file($file['tmp_name'], $image);
                $image = "." . $image;
            }

            $status = $_POST['status'];
            $role = $_POST['role'];
            $data = [
                'firstName' => "${firstName}",
                'lastName' => "${lastName}",
                'address' => "${address}",
                'phone' => "${phone}",
                'email' => "${email}",
                'password' => "${password}",
                'image' => "${image}",
                'status' => "${status}",
                'role' => "${role}"
            ];

            $id = $_POST["id"];
            $check = $this -> userModel -> checkExist("users", "email", $email, $id);

            if($check == "") {
                $this -> userModel -> updateUser($data, $id);
                header('location: ../user');
            } else {
                header("location: ../user/update?id=${id}&${check}");
            }

            
        }

        public function delete() {
            if(isset($_POST["action"])) {
                $action = $_POST["action"];
                switch ($action) {
                    case 'delete':
                        $id = $_POST['userIds'];
                        $this -> userModel -> deleteUser($id);
                        header('location: ../user');
                        break;
                    default:
                        break;
                }
            } else {
                if(isset($_GET["id"])) {
                    $id = $_GET['id'];
                    $this -> userModel -> deleteUser($id);
                    header('location: ../user');
                }
            }
        }
    }
?>