<?php 
    class BaseController {

        const VIEW_FOLDER_NAME = 'app/Views';
        const MODEL_FOLDER_NAME = 'app/Models';

        protected function view($path, array $data = []) {
            foreach($data as $key => $value) {
                $$key = $value;
            }

            return require (self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php');
        }

        protected function model($path) {
            return require (self::MODEL_FOLDER_NAME . '/' . $path . '.php');
        }

        protected function pagination($table, $data, $limit, $model, $id = "") {
            $result_per_page = $limit;
            $number_of_pages = ceil(count(array_values($data)) / $limit);

            if(!isset($_GET["page"])) {
                $page = 1;
            } else {
                $page = $_GET["page"];
            }

            $result_on_page = ($page - 1) * $result_per_page;
            if($id == "") {
                $sql = "SELECT * from $table LIMIT ${result_on_page}, ${result_per_page}";
            } else {
                $sql = "SELECT * from $table where category_id = ${id} LIMIT ${result_on_page}, ${result_per_page}";
            }
            return $result = [$model -> query_all($sql), $number_of_pages];
        }
    }
?>