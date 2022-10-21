<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Core/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                        <a class="nav-link active" aria-current="page" href="../../admin/comment">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admin/category/statistical">Thống kê</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </header>
        
        <div class='d-flex mt-4 justify-content-between align-items-center'>
            <h3>Chi tiết bình luận</h3>
        </div>

        <form action="../comment/delete" method="POST">
            <div class='mt-4 d-flex align-items-center'>
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='' id='check-all' />
                    <label class='form-check-label' for='check-all'>
                        Chọn tất cả (<?= count($comments)?>)
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
                </select>
    
                <button id='execute-btn' class='btn btn-primary btn-sm disabled'>Thực hiện</button>
            </div>
    
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">STT</th>
                        <th scope="col">Content</th>   
                        <th scope="col">Date</th>   
                        <th scope="col">User</th>   
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($comments as $key => $comment) : ?>
                        <tr> 
                            <td width="50px">
                                <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='commentIds[]' value='<?=$comment[0]?>' />
                                </div>
                            </td>
                            <td><?=$key + 1?></td>
                            <td><?=$comment['content']?></td>
                            <td><?=$comment['date']?></td>
                            <td><?=$comment['firstName'] . " " . $comment['lastName']?></td>
                            <td width="50px">
                                <a class="btn btn-danger" href="../comment/delete?id=<?=$comment[0]?>" role="button">
                                    Delete
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
        const commentItemCheckbox = document.querySelectorAll('input[name="commentIds[]"]'); 
        const executeBtn = document.querySelector('#execute-btn');
        const containerForm = document.forms['container-form']; 

        //Checkbox all changed 
        checkAll.onchange = () => { 
            let isCheckedAll = checkAll.checked; 
            commentItemCheckbox.forEach(courseItem => { 
                courseItem.checked = isCheckedAll;
            })
            renderCheckedSubmitBtn();
        }

        // Course item checkbox changed 
        commentItemCheckbox.forEach(courseItem => {
            courseItem.onchange = () => { 
                let isCheckedAll = commentItemCheckbox.length === document.querySelectorAll('input[name="commentIds[]"]:checked').length; 
                checkAll.checked = isCheckedAll;
                renderCheckedSubmitBtn(); 
            } 
        })
        
        function renderCheckedSubmitBtn() { 
            let checkedCount = document.querySelectorAll('input[name="commentIds[]"]:checked').length; 
            checkedCount > 0 ? executeBtn.classList.remove('disabled') : executeBtn.classList.add('disabled'); 
        }
    </script>
</body>
</html>

