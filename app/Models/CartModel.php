<?php
    class CartModel extends BaseModel {
        const TABLE = 'carts';

        public function getDataFromCart($user_id, $product_id=[]) {
            
            if(count($product_id) != 0) {
                $product_ids = implode(',', $product_id);
                $sql = "SELECT c.*, cd.user_id, p.name, p.price, p.discount, p.image from carts c INNER JOIN carts_detail cd on c.cart_detail_id = cd.id inner JOIN products p on c.product_id = p.id WHERE cd.user_id = ${user_id} and product_id in (${product_ids})";
            } else {
                $sql = "SELECT c.*, cd.user_id, p.name, p.price, p.discount, p.image from carts c INNER JOIN carts_detail cd on c.cart_detail_id = cd.id inner JOIN products p on c.product_id = p.id WHERE cd.user_id = ${user_id} GROUP BY cd.user_id, c.product_id";
            }
            
            return $data = $this -> query_all($sql);
        }

        public function deleteDataFromCart($user_id, $product_id) {
            $product_ids = implode(',', $product_id);
            $sql = "DELETE from carts where cart_detail_id = (SELECT c.cart_detail_id from carts c INNER JOIN carts_detail cd on c.cart_detail_id = cd.id where user_id = ${user_id} GROUP BY cart_detail_id) and product_id IN (${product_ids})";
            
            $this -> execute($sql);
            $this -> resetId(self::TABLE); 
        }

        public function addDataToCart($data) {
            return $this -> create(self::TABLE, $data); 
        }

        public function updateQuantity($product_id, $user_id, $oldQuantity, $newQuantity) {
            $sql = "UPDATE carts c INNER JOIN carts_detail cd on c.cart_detail_id = cd.id set quantity = (${oldQuantity} + ${newQuantity}) where c.product_id = ${product_id} and cd.user_id = ${user_id}";
            $this -> execute($sql);
        }
    }
?>