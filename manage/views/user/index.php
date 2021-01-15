<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../manage/views/resource/fontawsome/css/all.css"/>
    <link rel="stylesheet" href="../manage/views/resource/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../manage/views/resource/js/custom.js"></script>
</head>
<body>
<div class="user container">
    <div class="row">
        <div class="col-lg-11">
            <h1 class="text-danger">Manage</h1>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="http://127.0.0.1/dev_train_02/manage/index.php?controller=posts">New</a>
        </div>
    </div>

    <div class="row">
        <div class="list-infor width100">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th scope="col">Thumb</th>
                    <th scope="col">Title</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="id" scope="row">1</th>
                    <td class="thumb"><img src="../manage/views/resource/image/demo.jpg" alt="demo" class="image-size"/></td>
                    <td class="title">Title test 1</td>
                    <td class="status">Enable</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="id" scope="row">2</th>
                    <td class="thumb"><img src="../manage/views/resource/image/demo.jpg" alt="demo" class="image-size"/></td>
                    <td class="title">Title test 2</td>
                    <td class="status">Enable</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="id" scope="row">3</th>
                    <td class="thumb"><img src="../manage/views/resource/image/demo.jpg" alt="demo" class="image-size"/></td>
                    <td class="title">Title test 3</td>
                    <td class="status">Enable</td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="id" scope="row">4</th>
                    <td class="thumb"><img src="../manage/views/resource/image/demo.jpg" alt="demo" class="image-size"/></td>
                    <td class="title">Title test 4</td>
                    <td class="status">Enable</td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="id" scope="row">5</th>
                    <td class="thumb"><img src="../manage/views/resource/image/demo.jpg" alt="demo" class="image-size"/></td>
                    <td class="title">Title test 5</td>
                    <td class="status">Enable</td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="../admin/add.php">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>