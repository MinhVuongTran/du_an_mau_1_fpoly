<?php 
    class CommentController extends BaseController {

        private $commentModel;

        public function __construct() {
            $this -> model('CommentModel');
            $this -> commentModel = new CommentModel;
        }

        public function index() {
            $comments = $this -> commentModel -> manageComments();
            return $this -> view('admin.comments.index', [
                'comments' => $comments,
            ]);
        }

        public function detail() {
            if(isset($_GET["id"])) {
                $product_id = $_GET["id"];
            }
            $comments = $this -> commentModel -> getComments($product_id);
            return $this -> view('admin.comments.detail', [
                'comments'=> $comments
            ]);
        }

        public function delete() {
            if(isset($_POST["action"])) {
                $action = $_POST["action"];
                switch ($action) {
                    case 'delete':
                        $id = $_POST['commentIds'];
                        $this -> commentModel -> deleteComment($id);
                        header('location: ../comment');
                        break;
                    default:
                        break;
                }
            } else {
                if(isset($_GET["id"])) {
                    $id = $_GET['id'];
                    $this -> commentModel -> deleteComment($id);
                    header('location: ../comment');
                }
            }

        }
    }
?>