<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Core/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
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
                <a class="navbar-brand fs-6" href="">Trang chủ</a>
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
                        <a class="nav-link active" aria-current="page" href="../../admin/category"
                        >Loại hàng</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admin/product">Hàng hóa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admin/user">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Thống kê</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </header>
            
        <form name='form' action="../product/saveCreate" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" class="form-control" id="discount" name="discount">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="received_date" class="form-label">Received_date</label>
                <input type="date" class="form-control" id="received_date" name="received_date">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3 d-flex">
                <label for="special" class="form-label">Special</label>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="special" value="0" id="no-special">
                    <label for="no-special" class="form- mb-1 ps-1">No</label>
                </span>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="special" value="1" id="yes-special">
                    <label for="yes-special" class="form-label mb-1 ps-1">Yes</label>
                </span>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category_name</label>
                <select class="w-100 text-center" name="category_id" id="category_id">
                    <option value="">---Select---</option>
                    <?php foreach($categories as $category) : ?>
                        <option value="<?=$category['id']?>"><?=$category['name']?></option>   
                    <?php endforeach ?>
                </select>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary me-3 rounded">Thêm mới</button>
                <div class="btn re-enter-btn btn-primary me-3 rounded" role="button">Nhập lại</div>
                <a class="btn btn-primary me-3 rounded" href="../product" role="button">Danh sách</a>
            </div>
        </form>


    </div>
    <script>
        const reEnterBtn = document.querySelector('.re-enter-btn');
        reEnterBtn.onclick = () => {
            document.forms['form'].reset();
        }
    </script>
</body>
</html>