<?php 
    $routes['default_controller'] = 'site';
    $routes['trang-chu'] = '/';
    $routes['loai-hang'] = 'category';
    $routes['loai-hang/them-moi'] = 'category/create';
    $routes['loai-hang/cap-nhat/(\d+)'] = 'category/update?id=$1';
    $routes['san-pham'] = 'product';
    $routes['san-pham/them-moi'] = 'product/create';
    $routes['san-pham/cap-nhat/(\d+)'] = 'product/update/$1';

?>