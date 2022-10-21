<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    require './Core/Database.php';
    require './app/Models/BaseModel.php';
    require './app/Controllers/BaseController.php';
    require './helpers/view.php';
    require './helpers/getUrl.php';
    require './configs/routes.php';
    require './Core/Route.php';
    require './app/App.php';

    $app = new App();
?>