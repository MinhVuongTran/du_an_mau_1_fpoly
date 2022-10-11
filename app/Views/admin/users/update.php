<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Core/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                <a class="navbar-brand fs-6" href="../../admin">Trang chủ</a>
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
        <form name='form' action="../user/saveUpdate" method="POST">
            <input type="hidden" value="<?=$data['id']?>" name="id">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label> 
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?=$data['firstName']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label> 
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?=$data['lastName']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label> 
                <input type="text" class="form-control" id="address" name="address" value="<?=$data['address']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Last Name</label> 
                <input type="text" class="form-control" id="phone" name="phone" value="<?=$data['phone']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">Email</label> 
                <input type="email" class="form-control " id="email" name="email" value="<?=$data['email']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label> 
                <div class="position-relative">
                    <input type="password" class="form-control" id="password" name="password" value="<?=$data['password']?>">
                    <i type="button" id="toggle-password" class="bi bi-eye fs-5 pointer position-absolute top-50 end-0 translate-middle"></i>
                </div>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="<?=$data['image']?>">
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3 d-flex">
                <label for="status" class="form-label">Status</label>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="status" id="no-status" value="0" <?= $data['status'] == 0 ? "checked" : ""?>>
                    <label for="no-status" class="form- mb-1 ps-1">No</label>
                </span>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="status" id="yes-status" value="1" <?= $data['status'] == 1 ? "checked" : ""?>>
                    <label for="yes-status" class="form-label mb-1 ps-1">Yes</label>
                </span>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="mb-3 d-flex">
                <label for="role" class="form-label">Role</label>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="role" id="no-role" value="0" <?= $data['role'] == 0 ? "checked" : ""?>>
                    <label for="no-role" class="form- mb-1 ps-1">No</label>
                </span>
                <span class="ms-4 d-inline-flex align-items-center">
                    <input type="radio" name="role" id="yes-role" value="1" <?= $data['role'] == 1 ? "checked" : ""?>>
                    <label for="yes-role" class="form-label mb-1 ps-1">Yes</label>
                </span>
                <?php if(isset($_GET['error'])) : ?>
                    <p class='error text-danger mt-2 fw-bold'><?=$_GET['error']?></p>
                <?php endif ?>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary me-3 rounded">Cập nhật</button>
                <div class="btn re-enter-btn btn-primary me-3 rounded" role="button">Nhập lại</div>
                <a class="btn btn-primary me-3 rounded" href="../user" role="button">Danh sách</a>
            </div>
        </form>
    </div>
    <script>
        const reEnterBtn = document.querySelector('.re-enter-btn');
        reEnterBtn.onclick = () => {
            document.forms['form'].reset();
        }

        const togglePassword = document.querySelector('#toggle-password');
        const passwordElement = document.querySelector("input[name='password']");

        console.log(togglePassword.classList.contains('bi-eye'));

        togglePassword.addEventListener('click', function (e) {
            const type = passwordElement.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordElement.setAttribute('type', type);

            if(togglePassword.classList.contains('bi-eye')) {
                togglePassword.classList.remove('bi-eye');
                togglePassword.classList.add('bi-eye-slash');
            } else {
                togglePassword.classList.remove('bi-eye-slash');
                togglePassword.classList.add('bi-eye');
            }
        })
    </script>
</body>
</html>