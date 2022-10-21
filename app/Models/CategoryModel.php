<?php
    class CategoryModel extends BaseModel {
        const TABLE = 'categories';

        public function getAll($select = ['*']) {
           return $this -> all(self::TABLE, $select);
        }

        public function statistical() {
            $sql = "SELECT SUM(p.quantity) as sum, MAX(p.price) as max, MIN(p.price) as min, AVG(p.price) as average,c.name as category_name from products p inner join categories c on p.category_id = c.id GROUP BY category_id";
            return $data = $this -> query_all($sql);
        }

        public function getOne($id) {
            return $this -> one(self::TABLE, $id);
        }

        public function createCategory($data) {
            return $this -> create(self::TABLE, $data); 
        }

        public function updateCategory($data, $id) {
            return $this -> update(self::TABLE, $data, $id); 
        }

        public function deleteCategory($id) {
            $this -> delete(self::TABLE, $id);
            $this -> resetId(self::TABLE); 
        }
    }
?>