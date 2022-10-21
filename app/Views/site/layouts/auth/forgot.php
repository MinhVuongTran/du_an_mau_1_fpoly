<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Core/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="signin-wrapper">
        <div class="text-center">
            <span class="fw-semibold fs-3 text-danger">MVT</span>
        </div>
        <div class="text-center my-5">
            <h1 class="fw-bold">Forgot the password</h1>
        </div>
        <?php if(isset($password)) : ?>
            <div class="text-center">
                <p class="text-center fs-5">Mật khẩu của bạn là: <?= $password ?></p>
                <a class="btn btn-primary mt-2" href="../../" role="button">Trang chủ</a>
            </div>
        <?php else : ?>
            <form action="./auth/forgot" method="post" class="px-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên đăng nhập</label>
                    <input
                        type="email"
                        class="form-control"
                        id="name"
                        name="username"
                        required
                    />
                </div>
                <div>
                    <?php if(isset($_GET["error"])) : ?>
                        <p class="error text-danger text-center fw-semibold">
                            Tài khoản không chính xác
                        </p>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
                <?php if(!isset($_SESSION["auth"])) : ?>
                    <p class="mt-4">Already have an account? <a href="./auth" class="text-decoration-none">Sign in</a> now!</p>
                    <p class="mt-4">Don't have an account? <a href="./auth?signup" class="text-decoration-none">Sign up</a> now!</p>
                <?php endif ?>
            </form>
        <?php endif ?>
    </div>
</body>
</html>