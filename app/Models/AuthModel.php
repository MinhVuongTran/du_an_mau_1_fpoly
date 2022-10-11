<?php 
    class AuthModel extends BaseModel {
        const TABLE = 'users';
        
        public function checkAuth($username, $password = "", $forgot = false) {
            if($forgot) {
                $data = $this -> all(self::TABLE);
                $check = false;
                foreach ($data as $key => $value) {
                    if ($value['email'] === $username) {
                        $check = true;
                        break;
                    }
                }
                return $check;
            } else {
                $data = $this -> all(self::TABLE);
                $check = false;
                foreach ($data as $key => $value) {
                    if($value['status'] === 0){
                        break;
                    }     
                    if ($value['email'] === $username) {
                        if($password === $value['password']) {
                            $check = true;
                            break;
                        }
                    }
                }
                return $check;
            }
        }

        public function getAuth($username) {
            $sql = "SELECT * from users where email = '${username}'";
            return $data = $this -> query_one($sql);
        }

        public function updateAuth($data, $id) {
            return $this -> update(self::TABLE, $data, $id); 
        }

        public function createAuth($data) {
            return $this -> create(self::TABLE, $data); 
        }
    }
?>