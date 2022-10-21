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
    }
?>