<?php 
    class CommentModel extends BaseModel {
        const TABLE = 'comments';
        
        public function getComments($id) {
            $sql = "SELECT c.*, u.* from comments c INNER JOIN users u on c.user_id = u.id where c.product_id = ${id} order by c.id desc";
            return $data = $this -> query_all($sql); 
        }

        public function addComment($data) {
            $this -> create(self::TABLE, $data);
        }
    }
?>