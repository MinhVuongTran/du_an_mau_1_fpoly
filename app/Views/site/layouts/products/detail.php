<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Core/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="">
        <header class="my-4 position-sticky top-0 bg-white" style="z-index: 999">
            <div class="px-3 py-2 text-success bg-success bg-opacity-10 main-title" style="margin: 20px 0px">
                <div class="container m-auto text-center">
                    <h1>Siêu Thị Trực Tuyến</h1>
                </div>
            </div>
            <div class="bg-dark">
                <nav class="container m-auto navbar navbar-expand-lg navbar-dark text-center">
                    <div class="container-fluid">
                        <a class="navbar-brand fs-5" href="../../">Trang chủ</a>
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
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
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
        <div class="container m-auto mt-5">
            <div class="row">
                <div class="col-4 ">
                    <img class="w-100" src="<?= $product['image'] ?>" alt="">
                </div>
                <div class="col-8 px-5 pt-5">
                    <h1><?= $product['name'] ?></h1>
                    <div class="bg-muted d-flex align-items-center">
                        <?php if($product['discount'] > 0) : ?>
                            <span class="fs-5 text-muted text-decoration-line-through "><?= $product['price'] ?>$</span>
                            <h2 class="text-danger m-0 mx-4"><?= $product['price'] - ($product['price'] * $product['discount'] / 100) ?>$</h2>
                            <span class="fw-semibold text-white bg-danger bg-opacity-75 rounded p-1"><?= $product['discount'] ?>% OFF</span>   
                        <?php else : ?>
                            <h2 class="text-danger m-0"><?= $product['price'] ?>$</h2>
                        <?php endif ?>
                    </div>
                    <div class="mt-4">
                        <h3><?= $product['description'] ?></h3>
                    </div>
                    <form <?php if(isset($_SESSION["auth"])) : ?>
                            <?= "action='./addToCart?id="  . $product['id'] . "'" ?> 
                        <?php else : ?>
                            <?= "action='../auth'"?>
                        <?php endif ?>
                        method="POST">
                        <div class="d-flex align-items-center">
                            <span class="me-4 fs-5">Quantity</span>
                            <div class="d-flex align-items-center ">
                                <span class="btn-quantity btn-quantity_dash"><i class="bi bi-dash fs-5 fw-semibold"></i></span>
                                <input type="number" name="quantity" min="0" max="<?= $product['quantity'] ?>" step="1" id="product_quantity" class="product_quantity btn-quantity fs-5" value="1">
                                <span class="btn-quantity btn-quantity_plus"><i class="bi bi-plus fs-5 fw-semibold"></i></span>
                            </div>
                            <span class="ms-4 text-secondary"><?= $product['quantity'] ?> pieces available</span>
                        </div>
                        <div class="d-flex algin-items-center mt-4">
                            <button class="btn btn-success me-4 fs-5 rounded-1" type="submitx">
                                <i class="bi bi-cart-plus"></i>
                                Add To Cart
                            </button>
                            <a class="btn btn-primary fs-5 rounded-1" href="#" role="button">
                                Buy Now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <form action="../product/addComment?id=<?= $product['id'] ?>" method="POST" class="d-flex flex-column rounded border mt-5">
                <div class="box-title__header">
                    <h2 class="m-0 fs-5">Comments</h2>
                </div>
                <?php foreach($comments as $comment) : ?>
                    <div class="d-flex align-items-center my-3 mx-5">
                        <div class="avatar d-flex rounded-circle me-4" style="width: 50px; height: 50px">
                            <img class="w-100 rounded-circle" src="<?= $comment['image'] ?>" alt="">
                        </div>
                        <div class="body">
                            <span class="name fs-5 fw-semibold">
                                <?= $comment['firstName'] . " " . $comment['lastName'] ?>
                            </span>
                            <div class="content fs-6">
                                <?= $comment['content'] ?>
                            </div>
                        </div>
                            <div class="time ms-auto">
                                <?= $comment['date'] ?>
                            </div>
                    </div>
                <?php endforeach ?>
                <?php if(isset($_SESSION["auth"])) : ?>
                    <div class="d-flex align-items-center my-3 mx-5">
                        <div class="avatar d-flex rounded-circle me-4" style="width: 50px; height: 50px">
                            <img class="w-100 rounded-circle" src="<?= $_SESSION["auth"]['image'] ?>" alt="">
                        </div>
                        <div class="d-flex w-75">
                            <input type="text" class="form-control w-75 me-2" name="content" placeholder="Add comment...">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                <?php else : ?>
                    <p class="my-3 mx-5"><a href="../auth" class="text-decoration-none">Đăng nhập</a> để bình luận</p>
                <?php endif ?>
            </form>
        </div>
    </div>  

    <footer class="my-4 info px-3 py-3">
        <div class="container m-auto text-center">
            <span class="fs-5">Copyright @ MVT</span>
        </div>
    </footer>
    <script>
        const plusBtn = document.querySelector('.btn-quantity_plus');
        const quantityBtn = document.querySelector('#product_quantity');
        const dashBtn = document.querySelector('.btn-quantity_dash');

        plusBtn.onclick = () => {
            let value = Number(quantityBtn.value);
            if (value + 1 > <?= $product['quantity']?>) {
                return;
            }
            quantityBtn.value = value + 1;
        }

        dashBtn.onclick = () => {
            let value = Number(quantityBtn.value);
            if (value === 1) {
                return;
            }
            quantityBtn.value = value - 1;
        }
    </script>
</body>
</html>