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
    <!-- Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        
        <?php if(!isset($_GET["chart"])) : ?>
            <div class='d-flex mt-4 justify-content-between align-items-center'>
                <h3>Thống kê từng loại hàng hóa</h3>
            </div>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">STT</th>   
                        <th scope="col">Name</th>   
                        <th scope="col">Total</th>   
                        <th scope="col">Min price</th>   
                        <th scope="col">Max price</th>   
                        <th scope="col">Average</th>   

                    </tr>
                </thead>
                <tbody>
                <?php foreach($statisticals as $key => $statistical) : ?>
                        <tr> 
                            <td><?=$key + 1?></td>
                            <td><?=$statistical['category_name']?></td>
                            <input type="hidden" name="name" value="<?=$statistical['category_name']?>">
                            <td><?=$statistical['sum']?></td>
                            <input type="hidden" name="sum" value="<?=$statistical['sum']?>">
                            <td><?=$statistical['min']?>$</td>
                            <td><?=$statistical['max']?>$</td>
                            <td><?=ceil($statistical['average'])?>$</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a class="btn btn-primary me-3 rounded" href="./statistical?chart" role="button">Chart</a>
        <?php else : ?>
                <?php foreach($statisticals as $statistical) : ?>
                        <input type="hidden" name="name" value="<?=$statistical['category_name']?>">
                        <input type="hidden" name="sum" value="<?=$statistical['sum']?>">
                    <?php endforeach ?>
            <div id="myChart" class="mx-auto" style="width:100%; max-width:600px; height:500px;"></div>
            <div class="text-center">
                <a class="btn btn-primary me-3 rounded" href="./statistical" role="button">Statistical</a>
            </div>
            <footer class="my-4 info px-3 py-3">
            <div class="container m-auto text-center">
                <span class="fs-5">Copyright @ MVT</span>
            </div>
        </footer>
        <?php endif ?> 
    </div>

    <script>
        const name = document.querySelectorAll("input[name='name']");
        const sum = document.querySelectorAll("input[name='sum']");
        const arr = []

        for (let i = 0; i < name.length; i++) {
            arr.push(
                {
                    name: name[i].value,
                    sum: sum[i].value
                }
                
            )
        }

        const newData = arr.reduce((pre, currValue, currIndex) => {
            return [...pre, [currValue.name, Number(currValue.sum)]];
        }, [['Contry', 'Mhl']])

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(newData);

            var options = {
                title: 'Tỉ lệ hàng hóa',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

</body>
</html>