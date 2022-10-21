<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Core/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="my-4">
            <div class="my-4 px-3 py-2 text-danger rounded bg-danger bg-opacity-25">
                <h1>Quản trị Website</h1>
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
                <div class="container-fluid">
                <a class="navbar-brand fs-6" href="../admin">Trang chủ</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-6">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/category"
                        >Loại hàng</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/product">Hàng hóa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/user">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/comment">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/category/statistical">Thống kê</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </header>
        
        <div class='d-flex mt-4 justify-content-between align-items-center'>
            <h3>Danh sách bình luận</h3>
        </div>

        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">STT</th>   
                    <th scope="col">name</th>   
                    <th scope="col">total</th>   
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($comments as $key => $comment) : ?>
                    <tr>    
                        <td><?=$key + 1?></td>
                        <td><?=$comment['name']?></td>
                        <td><?=$comment['sum']?></td>
                        <td width="50px">
                            <a class="btn btn-primary" href="./comment/detail?id=<?=$comment['id']?>" role="button">
                                Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>