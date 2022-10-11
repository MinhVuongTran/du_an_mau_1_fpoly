<?php

    class UserModel extends BaseModel {
        const TABLE = 'users';

        public function getAll($select = ['*']) {
           return $this -> all(self::TABLE, $select);
        }

        public function getOne($id) {
            return $this -> one(self::TABLE, $id);
        }

        public function createUser($data) {
            return $this -> create(self::TABLE, $data); 
        }

        public function updateUser($data, $id) {
            return $this -> update(self::TABLE, $data, $id); 
        }

        public function deleteUser($id) {
            $this -> delete(self::TABLE, $id);
            $this -> resetId(self::TABLE); 
        }
    }
?>