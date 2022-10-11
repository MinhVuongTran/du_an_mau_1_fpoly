<?php 

?>

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
    <header class="my-4 position-sticky top-0 bg-white" style="z-index: 99">
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
    <div class="container mt-5">
        <form action="./cart/checkout" method="POST">
            <div class='d-flex align-items-center'>
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='' id='check-all' />
                    <label class='form-check-label' for='check-all'>
                        Chọn tất cả (<?= count($carts)?>)
                    </label>
                </div>
                <select
                    class='checkbox-select-all-options form-select form-select-sm mx-4'
                    name='action'
                    aria-label='.form-select-lg example'
                    required
                >
                    <option value='' selected>--Hành động--</option>
                    <option value='delete'>Xóa</option>
                    <option value='buy'>Mua</option>
                </select>
    
                <button id='execute-btn' class='btn btn-primary btn-sm disabled' type="submit">Thực hiện</button>
            </div>
            <table class="table align-middle mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">name</th>   
                        <th scope="col">image</th>   
                        <th scope="col">quantity</th>   
                        <th scope="col">price</th>   
                        <th scope="col">discount</th>   
                        <th scope="col">total</th>   
                        <th scope="col">
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($carts as $cart) : ?>
                        <tr>
                            <td width="50px">
                                <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='cartIds[]' value='<?=$cart['product_id']?>' />
                                </div>
                            </td>
                            <td width="250px"><?=$cart['name']?></td>
                            <td width="100px">
                                    <img class="w-100" src="<?=$cart['image']?>" alt="">
                                </td>
                            <td>
                                <div class="d-flex align-items-center ">
                                    <span class="btn-quantity btn-quantity_dash"><i class="bi bi-dash fs-5 fw-semibold"></i></span>
                                    <input type="number" name="quantity" min="0" max="<?= $products[$cart['product_id'] - 1]['quantity'] ?>" step="1" id="product_quantity" class="product_quantity btn-quantity fs-5" value="<?= $cart['quantity'] ?>">
                                    <span class="btn-quantity btn-quantity_plus"><i class="bi bi-plus fs-5 fw-semibold"></i></span>
                                </div>    
                            </td>
                            <td><?=$cart['price']?>$</td>
                            <td><?=$cart['discount']?></td>
                            <td><?=$cart['discount'] == 0 ? $cart['quantity'] * $cart['price'] : $cart['quantity'] * $cart['price'] * ($cart['discount'] / 100) ?>$</td>
                            <td width="50px">
                                <a class="btn btn-primary" href="./cart/checkout?id=<?=$cart['product_id']?>" role="button">
                                    Mua
                                </a>
                            </td>
                            <td width="50px">
                                <a class="btn btn-danger" href="./cart/delete?id=<?=$cart['product_id']?>" role="button">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        const checkAll = document.querySelector('#check-all'); 
        const cartItemCheckbox = document.querySelectorAll('input[name="cartIds[]"]'); 
        const executeBtn = document.querySelector('#execute-btn');
        const containerForm = document.forms['container-form']; 

        //Checkbox all changed 
        checkAll.onchange = () => { 
            let isCheckedAll = checkAll.checked; 
            cartItemCheckbox.forEach(courseItem => { 
                courseItem.checked = isCheckedAll;
            })
            renderCheckedSubmitBtn();
        }

        // Course item checkbox changed 
        cartItemCheckbox.forEach(courseItem => {
            courseItem.onchange = () => { 
                let isCheckedAll = cartItemCheckbox.length === document.querySelectorAll('input[name="cartIds[]"]:checked').length; 
                checkAll.checked = isCheckedAll;
                renderCheckedSubmitBtn(); 
            } 
        })
        
        function renderCheckedSubmitBtn() { 
            let checkedCount = document.querySelectorAll('input[name="cartIds[]"]:checked').length; 
            checkedCount > 0 ? executeBtn.classList.remove('disabled') : executeBtn.classList.add('disabled'); 
        }

        const plusBtn = document.querySelectorAll('.btn-quantity_plus');
        const quantityBtn = document.querySelectorAll('.product_quantity');
        const dashBtn = document.querySelectorAll('.btn-quantity_dash');

        plusBtn.forEach((btn, index) => {
            btn.onclick = () => {
                let value = Number(quantityBtn[index].value);
                if (value + 1 > quantityBtn[index].max) {
                    return;
                }
                quantityBtn[index].value = value + 1;
            }
        })

        dashBtn.forEach((btn, index) => {
            btn.onclick = () => {
                let value = Number(quantityBtn[index].value);
                if (value === 1) {
                    return;
                }
                quantityBtn[index].value = value - 1;
            }
        })
    </script>
</body>
</html>;