<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Core/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
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
                        <a class="navbar-brand fs-5" href="../">Trang chủ</a>
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
        <div class="container">
            <div class="categories-wrapper d-flex justify-content-center align-items-center">
                <a href="./category" class="btn btn-primary rounded-pill fs-6 fw-semibold text-white px-3 me-3">
                    Tất cả
                </a>
                <?php foreach($categories as $category) : ?>
                    <a href="./category?id=<?= $category['id'] ?>" class="btn btn-primary rounded-pill fs-6 fw-semibold text-white px-3 me-3">
                        <?= $category['name'] ?>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="text-center product-list mt-4">
                <div class="row row-cols-5 g-4">
                    <?php foreach ($products as $product) : ?>
                        <div class="col">
                            <div class="card w-100 h-100 p-0 overflow-hidden">
                                <a href="../site/product/detail?id=<?= $product['id'] ?>" class="h-100">
                                    <img
                                        src="<?= $product['image'] ?>"
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
            </div>
        </div>
        <footer class="my-4 info px-3 py-3">
            <div class="container m-auto text-center">
                <span class="fs-5">Copyright @ MVT</span>
            </div>
        </footer>
    </div>
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
    </script>
</body>
</html>
