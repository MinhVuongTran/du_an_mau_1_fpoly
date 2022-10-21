<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Core/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="">
        <?php if(isset($_GET["adminError"])) : ?>
            <div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 100">
                <div class="toast-container top-0 end-0 me-5" >
                    <div class="toast show align-items-center text-bg-danger bg-opacity-75 border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000" data-bs-animation="true">
                        <div class="d-flex">
                            <div class="toast-body fw-semibold fs-6">
                                Permission denied
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif?>
        <header class="my-4 position-sticky top-0 bg-white" style="z-index: 99">
            <div class="px-3 py-2 text-success bg-success bg-opacity-10 main-title" style="margin: 20px 0px">
                <div class="container m-auto text-center">
                    <h1>Siêu Thị Trực Tuyến</h1>
                </div>
            </div>
            <div class="bg-dark">
                <nav class="container m-auto navbar navbar-expand-lg navbar-dark text-center">
                    <div class="container-fluid">
                        <a class="navbar-brand fs-5" href="./">Trang chủ</a>
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
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5 align-items-start">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#"
                                    >Giới thiệu</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Góp ý</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Hỏi đáp</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container main-content row m-auto">
            <section class="products col-9">
                <!-- slides -->
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php foreach($productsView as $key => $productView) : ?>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : ''?>" <?= $key == 0 ? "aria-current='true'" : ''?> aria-label="Slide <?= $key + 1 ?>"></button>
                        <?php endforeach ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($productsView as $key => $productView) : ?>
                            <?php $arrUrl = explode("../", $productView['image']);
                                $urlImg = $arrUrl[1];
                            ?>
                            <div class="carousel-item <?= $key == 0 ? 'active' : ''?>"  data-bs-interval="10000">
                                <img
                                    src="./<?= $urlImg ?>"
                                    class="d-block m-auto w-100 slide-img"
                                    alt=""
                                    style="object-fit: contain"
                                />
                            </div>
                        <?php endforeach ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- List product -->
                <div class="text-center product-list mt-4">
                    <div class="row row-cols-3 g-4">
                        <?php foreach ($products as $product) : ?>
                            <?php $arrUrl = explode("../", $product['image']);
                                $urlImg = $arrUrl[1];
                            ?>
                            <div class="col">
                                <div class="card w-100 h-100 p-0 overflow-hidden">
                                    <a href="./site/product/detail?id=<?= $product['id'] ?>" class="h-100">
                                        <img
                                            src="./<?= $urlImg ?>"
                                            class="card-img-top w-100 h-100"
                                            alt="<?= $product['name'] ?>"
                                            style="object-fit: cover;"
                                        />
                                    </a>
                                    <div class="card-body text-start fs-5">
                                        <div class="bg-muted d-flex align-items-center justify-content-center fs-4">
                                            <?php if($product['discount'] > 0) : ?>
                                                <span class="fs-5 text-muted text-decoration-line-through "><?= $product['price'] ?>$</span>
                                                <p class="text-danger m-0 mx-4 fw-semibold"><?= $product['price'] - ($product['price'] * $product['discount'] / 100) ?>$</p>   
                                            <?php else : ?>
                                                <p class="text-danger m-0 fw-semibold"><?= $product['price'] ?>$</p>
                                            <?php endif ?>
                                        </div>
                                        <p class="card-text product_name"><?= $product['name'] ?></p>
                                    </div>
                                    <div class="product-item__sell fw-semibold fs-6">
                                        <span class="text-danger fw-semibold percent">
                                            <?=$product['discount']?>%
                                        </span>
                                        <span class="text-white">OFF</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>
                    <!-- Pagination -->
                    <?php if(isset($numOfPage)) : ?>
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination justify-content-center mt-4">
                                <li class="page-item <?= !isset($_GET["page"]) || $_GET["page"] == 1 ? "disabled" : "" ?>">
                                    <a class="page-link" 
                                        href="?page=<?=isset($_GET["page"]) ? $_GET["page"] - 1 : "" ?>"           
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i = 1; $i <= $numOfPage; $i++) : ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                <?php endfor ?>
                                <li class="page-item <?= isset($_GET["page"]) && ($_GET["page"] + 1) > $numOfPage || $numOfPage == 1 ? "disabled" : "" ?>" >
                                    <a class="page-link" 
                                        <?php if(!isset($_GET["page"]) || $_GET["page"] == 1) : ?>
                                            href="?page=2"
                                        <?php else : ?>
                                            href="?page=<?= $_GET["page"] + 1 ?>"
                                        <?php endif?>
                                        aria-label="Next"
                                    >
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif?>
                </div>
            </section>

            <aside class="categories d-flex flex-column justify-content-start col-3">
                <!-- Login -->
                <?php if(isset($_SESSION["auth"])) : ?>
                    <div class="login mb-4">
                        <div class="box-title__header">
                            <h2 class="m-0 fs-5">Tài khoản</h2>
                        </div>
                        <div class="border p-3">
                            <p>Xin chào <?= $_SESSION["auth"]['firstName']." ".$_SESSION["auth"]['lastName'] ?></p>
                            <?php if($_SESSION["auth"]['role'] === 1) : ?>
                                <a class="btn btn-primary w-100 mt-2" href="./admin" role="button">Trang quản trị</a>
                            <?php endif?>
                            <a class="btn btn-primary w-100 mt-2" href="./site/cart" role="button">Giỏ hàng</a>
                            <a class="btn btn-primary w-100 mt-2" href="./site/auth?update" role="button">Cập nhật tài khoản</a>
                            <a class="btn btn-primary w-100 mt-2" href="./site/auth?forgot" role="button">Quên mật khẩu</a>
                            <a class="btn btn-primary w-100 mt-2" href="./site/auth/logout" role="button">Đăng xuất</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="login mb-4">
                        <div class="box-title__header">
                            <h2 class="m-0 fs-5">Tài khoản</h2>
                        </div>
                        <form action="./site/auth/login" method="post" class="border p-3">
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
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <i type="button" id="toggle-password" class="bi bi-eye fs-5 pointer position-absolute top-50 end-0 translate-middle"></i>
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="">
                                    <input type="checkbox" class="form-check-input" id="remember" />
                                    <label class="form-check-label" for="remember">Remember</label>
                                </div>
                                <div class="">
                                    <a href="./site/auth?forgot" class="link-primary text-decoration-none button"
                                    >Forgot password ?</a
                                    >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                            <p class="text-center my-2">OR</p>
                            <a href="./site/auth?signup" class="btn btn-primary text-decoration-none w-100">Sign up</a>
                        </form>
                    </div>
                <?php endif ?>

                <!-- List category -->
                <div class="list-group mb-4">
                    <div class="box-title__header">
                        <h2 class="m-0 fs-5">Danh mục</h2>
                    </div>
                    <div class="box-content">
                        <?php foreach($categories as $category) : ?>
                            <a href="./site/category?id=<?= $category['id'] ?>"class="list-group-item list-group-item-action">
                                <?= $category['name'] ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                    <form action="./site?search" class="d-flex box-title__footer" role="search">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                            name="search"
                        />
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
                
                <!-- Favourite product -->
                <ul class="list-group">
                    <div class="box-title__header">
                        <h2 class="m-0 fs-5">Top 10 yêu thích</h2>
                    </div>
                    <?php foreach ($productsView as $productView) : ?>
                        <?php $arrUrl = explode("../", $productView['image']);
                                $urlImg = $arrUrl[1];
                        ?>
                        <a
                            href="./site/product/detail?id=<?= $productView['id'] ?>"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="w-25">
                                <img
                                    src="./<?= $urlImg ?>"
                                    alt=""
                                    class="w-100"
                                />
                            </div>
                            <div class="w-75 ps-4">
                                <span class="product_name"><?= $productView['name'] ?></span>
                            </div>
                        </a>
                    <?php endforeach ?>
                </ul>
            </aside>
        </div>

        <footer class="my-4 info px-3 py-3">
            <div class="container m-auto text-center">
                <span class="fs-5">Copyright @ MVT</span>
            </div>
        </footer>
    <div>

    <script>
        const percentsElement = document.querySelectorAll('.percent');
        const cards = document.querySelectorAll('.card');
        
        // Xóa label giảm giá nếu không có giảm giá
        for(let i = 0; i < percentsElement.length; i++) {
            let percent = Number(percentsElement[i].innerText.slice(0, -2));
            if(percent === 0) {
                cards[i].removeChild(cards[i].querySelector('.product-item__sell'));
            }
        }

        const body = document.body;
        const title = document.querySelector('.main-title');
        body.onscroll = () => {
            if(window.scrollY > 0) {
                Object.assign(title.style, {
                    margin: "0px",
                    animation: "identifier linear .3s"
                })
            } else {
                Object.assign(title.style, {
                    margin: "20px 0px",
                    animation: "identifier linear .3s"
                })
            }
        }

        const togglePassword = document.querySelector('#toggle-password');
        const passwordElement = document.querySelector("input[name='password']");
        if(togglePassword) {
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
        }
    </script>
</body>
</html>