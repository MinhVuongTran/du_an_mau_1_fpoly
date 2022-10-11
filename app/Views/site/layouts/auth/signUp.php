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
    <?php if(isset($_GET["successful"])) : ?>
        <div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 100">
            <div class="toast-container top-0 end-0 me-5" >
                <div class="toast show align-items-center text-bg-success bg-opacity-75 border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000" data-bs-animation="true">
                    <div class="d-flex">
                        <div class="toast-body fw-semibold fs-6">
                            Created successfully
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <?php header('Refresh: 2; URL=../');?>
    <?php endif?>
    <div class="signin-wrapper">
        <div class="text-center">
            <span class="fw-semibold fs-3 text-danger">MVT</span>
        </div>
        <div class="text-center my-5">
            <h1 class="fw-bold">Create new account</h1>
        </div>
        <form action="./auth/create" method="post" class="px-4">
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="firstName"
                    value="<?= $auth['firstName'] ?>"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="lastName"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input
                    type="number"
                    class="form-control"
                    id="phone"
                    name="phone"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password" name="password" required />
                    <i type="button" id="toggle-password" class="bi bi-eye fs-5 pointer position-absolute top-50 end-0 translate-middle"></i>
                </div>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <div class="position-relative">
                    <input type="text" class="form-control" id="avatar" name="image" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create</button>
            <p class="mt-4">Already have an account? <a href="./auth" class="text-decoration-none">Sign in</a> now!</p>
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