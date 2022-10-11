<?php 
    class AuthController extends BaseController
    {
        private $authModel;

        public function __construct() {
            $this -> model('AuthModel');
            $this -> authModel = new AuthModel;
        }

        public function index() {
            if (isset($_GET["update"])) {
                $auth = $this -> authModel -> getAuth($_SESSION["auth"]['email']);
                return $this -> view('site.layouts.auth.update', [
                    'auth' => $auth
                ]);
            }
            if (isset($_GET["forgot"])) {
                return $this -> view('site.layouts.auth.forgot'); 
            }
            if (isset($_GET["signup"])) {
                return $this -> view('site.layouts.auth.signup'); 
            }

            return $this -> view('site.layouts.auth.signIn');
        }

        public function login() {
            $username = $_POST["username"];

            $password = $_POST["password"];

            $check = $this -> authModel -> checkAuth($username, $password);

            if($check) {
                $auth = $this -> authModel -> getAuth($username);
                $_SESSION["auth"] = $auth;
                header("location: ../../");
            } else {
                header("location: ../auth?error");
            }
        }

        public function logout() {
            if(isset($_SESSION["auth"])) {
                unset($_SESSION["auth"]);
                header("location: ../../");
            }
        }

        public function forgot() {
            if(isset($_POST["username"])) {
                $username = $_POST["username"];

                $check = $this -> authModel -> checkAuth($username, "", true);

                if($check) {
                    $auth = $this -> authModel -> getAuth($username);
                    return $this -> view('site.layouts.auth.forgot', [
                        'password' => $auth['password'],
                    ]); 
                } else {
                    header("location: ../auth?forgot&error");
                }
            }
        }

        public function update() {
            if(isset($_SESSION["auth"])) {
                $auth = $_SESSION["auth"];
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $avatar = $_POST["avatar"];
                $data = [
                    'firstName' => "${firstName}",
                    'lastName' => "${lastName}",
                    'address' => "${address}",
                    'phone' => "${phone}",
                    'email' => "${email}",
                    'password' => "${password}",
                    'image' => "${avatar}",
                ];

                $this -> authModel -> updateAuth($data, $auth['id']);
                header("location: ../auth?update&successful");
            }
        }
        public function create() {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $avatar = $_POST["avatar"];
            $data = [
                'firstName' => "${firstName}",
                'lastName' => "${lastName}",
                'address' => "${address}",
                'phone' => "${phone}",
                'email' => "${email}",
                'password' => "${password}",
                'image' => "${avatar}",
                'status' => 1,
                'role' => 0,
            ];

            $this -> authModel -> createAuth($data);
            header("location: ../auth?signup&successful");
        }
    }
?>