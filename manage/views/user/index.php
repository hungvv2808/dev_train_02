<?php
    $limit = $_SESSION['limit'];
    $page = $_SESSION['page'];
    $pages = ceil($records / $limit);
    $previous = $page - 1;
    $next = $page + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Constant::RESOURCE_PATH ?>/views/resource/fontawsome/css/all.css"/>
    <link rel="stylesheet" href="<?= Constant::RESOURCE_PATH ?>/views/resource/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= Constant::RESOURCE_PATH ?>/views/resource/js/custom.js"></script>
</head>
<body>
<div class="user container">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="text-danger"><?= $title ?></h1>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success"
               href="<?= Constant::RESOURCE_PATH ?>/index.php?controller=posts&action=<?php echo Constant::TYPE_ADD ?>">Add new post</a>
        </div>
    </div>

    <div id="alert" class="row">
        <?php if (!empty($msg)): ?>
            <div class="alert <?= $css ?> width100">
                <?php echo $msg ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="list-infor width100">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Thumb</th>
                    <th scope="col">Title</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($posts)): ?>
                    <?php $index = 1 ?>
                    <?php foreach ($posts as $p) : ?>
                        <tr>
                            <th class="id" scope="row"><?php echo $p['id'] ?></th>
                            <td class="thumb"><img src="<?php echo $p['image'] ?>" alt="demo" class="image-size"/></td>
                            <td class="title"><?php echo $p['title'] ?></td>
                            <td class="status"><?php echo($p['status'] === '0' ? 'Enable' : 'Disable') ?></td>
                            <td class="text-center">
                                <a href="<?= Constant::RESOURCE_PATH ?>/index.php?controller=posts&action=<?php echo Constant::TYPE_SHOW ?>&id=<?php echo $p['id'] ?>">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= Constant::RESOURCE_PATH ?>/index.php?controller=posts&action=<?php echo Constant::TYPE_EDIT ?>&id=<?php echo $p['id'] ?>">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#" onclick="confirmDelete('<?= $p['title'] ?>', <?= $p['id'] ?>)">
                                    <i class="fas fa-trash-alt fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $index += 1 ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <th class="empty" colspan="7">Empty record</th>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?= $previous ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $pages; $i ++): ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?= $next ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    function confirmDelete(msg, id) {
        var r = confirm('Are you sure to delete post \"' + msg + '\" ?');
        if (r === true) {
            var url = window.location.origin + '/dev_train_02/manage/index.php?controller=posts&action=<?php echo Constant::TYPE_DELETE ?>&id=' + id;
            window.location = url;
        }
    }
</script>
</body>
</html>