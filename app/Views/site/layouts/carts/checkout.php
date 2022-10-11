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
    <header class="my-4 position-sticky top-0 bg-white" style="z-index: 99">
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
    <form class="container">
        <div class="rounded border">
            <div class="box-title__header">
                <h2 class="m-0 fs-5">Thông tin đặt hàng</h2>
            </div>
            <div class="row g-3 mb-4 mt-2 mx-5">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $auth['firstName'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $auth['lastName'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $auth['email'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $auth['address'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $auth['phone'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="PaymentMethod" class="form-label">Payment Method</label>
                    <select id="PaymentMethod" class="form-select" name="paymentMethod">
                        <option selected value="direct">Thanh toán khi nhận hàng</option>
                        <option value="credit-cart">Thanh toán bằng thẻ ngân hàng</option>
                        <option value="iBanking">Thanh toán bằng iBanking</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="rounded border mt-5">
            <div class="box-title__header">
                <h2 class="m-0 fs-5">Thông tin giỏ hàng</h2>
            </div>
            <table class="table align-middle mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">name</th>   
                        <th scope="col">image</th>   
                        <th scope="col">Amount</th>   
                        <th scope="col">Unit Price</th>   
                        <th scope="col">Item Subtotal</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product) : ?>
                        <tr>
                            <td></td>
                            <td width="250px"><?=$product['name']?></td>
                            <td width="100px">
                                    <img class="w-100" src="<?=$product['image']?>" alt="">
                                </td>
                            <td>
                                <?=$product['quantity']?>  
                            </td>
                            <td><?=$product['price'] - ($product['price'] * ($product['discount'] / 100)) ?>$</td>
                            <td>
                                <?=$product['quantity'] * ($product['price'] - ($product['price'] * ($product['discount'] / 100)))?>$
                            </td>
                        </tr>
                        <?php endforeach ?>
                        
                        <tr>
                            <td colspan="4"></td>
                            <td >Order Total(<?= count($products)?>)</td>
                            <td>    
                                <?php 
                                    $sum = 0;
                                    for ($i=0; $i < count($products) ; $i++) { 
                                        $sum += ceil($products[$i]['quantity'] * ($products[$i]['price'] - ($products[$i]['price'] * ($products[$i]['discount'] / 100))));
                                    }
                                ?>
                                <?= $sum ."$" ?>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-primary w-25" href="../../" role="button">Home</a>
            <button type="submit" class="btn btn-primary w-25">Place Order</button>
        </div>
    </form>
    <footer class="my-4 info px-3 py-3">
        <div class="container m-auto text-center">
            <span class="fs-5">Copyright @ MVT</span>
        </div>
    </footer>
</body>
</html>