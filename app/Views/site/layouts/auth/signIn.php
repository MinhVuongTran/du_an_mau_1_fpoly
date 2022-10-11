<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Core/style.css">
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
            <h2>Welcome back</h2>
            <h1 class="fw-bold">Login to your account</h1>
        </div>
        <form action="./auth/login" method="post" class="px-4">
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
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password" name="password" required />
                    <i type="button" id="toggle-password" class="bi bi-eye fs-5 pointer position-absolute top-50 end-0 translate-middle"></i>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="">
                    <input type="checkbox" class="form-check-input" id="remember"/>
                    <label class="form-check-label" for="remember">Remember</label>
                </div>
                <div class="">
                    <a href="./auth?forgot" class="link-primary text-decoration-none button"
                    >Forgot password ?</a
                    >
                </div>
            </div>
            <div>
                <?php if(isset($_GET["error"])) : ?>
                    <p class="error text-danger text-center fw-semibold">
                        Tài khoản hoặc mật khẩu không chính xác
                    </p>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
            <p class="text-center my-2">OR</p>
            <a href="./auth?signup" class="btn btn-primary text-decoration-none w-100">Sign up</a>
        </form>
    </div>

    <script>
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