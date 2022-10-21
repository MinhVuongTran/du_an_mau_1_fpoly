<?php 
    class CommentModel extends BaseModel {
        const TABLE = 'comments';
        
        public function getComments($id) {
            $sql = "SELECT c.*, u.* from comments c INNER JOIN users u on c.user_id = u.id where c.product_id = ${id} order by c.id desc";
            return $data = $this -> query_all($sql); 
        }

        public function manageComments() {
            $sql = "SELECT  p.id, p.name, COUNT(c.content) as sum from comments c INNER JOIN products p on c.product_id = p.id GROUP BY c.product_id";
            return $data = $this -> query_all($sql);
        }

        public function addComment($data) {
            $this -> create(self::TABLE, $data);
        }

        public function deleteComment($id) {
            $this -> delete(self::TABLE, $id);
            $this -> resetId(self::TABLE); 
        }
    }
?>