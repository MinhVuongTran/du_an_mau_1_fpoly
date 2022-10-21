<?php

    class ProductModel extends BaseModel {
        const TABLE = 'products';

        public function getAll($categoryId = "", $id = "", $relevant = false) {
                if($categoryId === "") {
                    $sql = "SELECT p.*, c.name as category_name from products p inner join categories c on p.category_id = c.id ORDER BY id asc";
                } else {
                    if (!$relevant) {
                        $sql = "SELECT p.*, c.name as category_name from products p inner join categories c on p.category_id = c.id WHERE p.category_id = ${categoryId} ORDER BY id asc";
                    } else {
                        $sql = "SELECT p.*, c.name as category_name from products p inner join categories c on p.category_id = c.id WHERE p.category_id = ${categoryId} and p.id != ${id} ORDER BY id asc";
                    }
                }
            return $data = $this -> query_all($sql);
        }

        public function getOne($id) {
            $sql = "SELECT p.*, c.name as category_name from products p inner join categories c on p.category_id = c.id where p.id = ${id}";
            return $data = $this -> query_one($sql);
        }

        public function getProductTopView() {
            $sql = "SELECT * from products ORDER BY VIEW DESC LIMIT 0,10";
            return $data = $this -> query_all($sql);
        }

        public function getProductsFromSearch($keyword) {
            $sql = "SELECT p.*, c.name as category_name from products p inner join categories c on p.category_id = c.id WHERE MATCH(p.name) AGAINST('${keyword}') ORDER BY id asc";
            return $data = $this -> query_all($sql);
        }

        public function createProduct($data) {
            return $this -> create(self::TABLE, $data); 
        }

        public function updateProduct($data, $id) {
            return $this -> update(self::TABLE, $data, $id); 
        }

        public function deleteProduct($id) {
            $this -> delete(self::TABLE, $id);
            $this -> resetId(self::TABLE); 
        }
    }
?>

