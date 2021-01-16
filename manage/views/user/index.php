<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
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
        <div class="col-lg-10">
            <h1 class="text-danger"><?= $title ?></h1>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success" href="../manage/index.php?controller=posts&action=add">Add new post</a>
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
                <?php foreach($posts as $p) : ?>
                <tr>
                    <th class="id" scope="row"><?php echo $p['id']?></th>
                    <td class="thumb"><img src="<?php echo $p['image']?>" alt="demo" class="image-size"/></td>
                    <td class="title"><?php echo $p['title']?></td>
                    <td class="status"><?php echo ($p['status'] === '0' ? 'Enable' : 'Disable') ?></td>
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
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>