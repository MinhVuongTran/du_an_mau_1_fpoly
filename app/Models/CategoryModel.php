<?php

    class CategoryModel extends BaseModel {
        const TABLE = 'categories';

        public function getAll($select = ['*']) {
           return $this -> all(self::TABLE, $select);
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