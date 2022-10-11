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
            $image = $_POST['image'];
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
            $this -> userModel -> createUser($data);
            header('location: ../user');
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
            $image = $_POST['image'];
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

            $this -> userModel -> updateUser($data, $id);
            header('location: ../user');
        }

        public function delete() {
            $id = $_GET['id'];
            $this -> userModel -> deleteUser($id);
            header('location: ../user');
        }
    }
?>