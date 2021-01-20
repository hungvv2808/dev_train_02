<?php
$limit = $_SESSION['limit'];
$page = $_SESSION['page'];
$pages = ceil($records / $limit);
$previous = $page - 1;
$next = $page + 1;

$limit_change = $_POST['limit-records'];
$_SESSION['limit'] = $limit_change;
if ($limit_change != null) {
    $_SESSION['limit-backup'] = $limit_change;
    header('Refresh: 0; url=' . $role);
} else {
    $_SESSION['limit-backup'] = Constant::RECORDS_LIMIT;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>(User) <?= $title ?></title>
    <base href="http://127.0.0.1/dev_train_02/manage/" />
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
    <div class="index">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center text-danger"><?= $title ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="list-infor width100">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">Thumb</th>
                        <th class="text-center" scope="col">Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($posts)): ?>
                        <?php $index = 1 ?>
                        <?php foreach ($posts as $p) : ?>
                            <tr>
                                <th class="id" scope="row"><?php echo $index ?></th>
                                <td class="thumb">
                                    <img src="<?php echo $p['image'] ?>" alt="demo" class="image-size"/>
                                </td>
                                <td class="title">
                                    <a href="<?= Constant::RESOURCE_PATH ?>/<?= Constant::ROLE_USER ?>/posts/<?php echo Constant::TYPE_SHOW ?>/<?php echo $p['id'] ?>">
                                        <?php echo $p['title'] ?>
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
                <div class="row">
                    <div class="col-lg-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item previous">
                                    <a class="page-link" href="<?= $role ?>/<?= $previous ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $pages; $i++): ?>
                                    <li class="page-item page-<?= $i ?>">
                                        <a class="page-link" href="<?= $role ?>/<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= $role ?>/<?= $next ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2">
                        <form id="pages" method="post" action="#">
                            <div class="form-group">
                                <select id="limit-records" name="limit-records" class="form-control">
                                    <option selected disabled> --- Pages ---</option>
                                    <?php foreach ([5, 10, 20, 50, 100] as $limit): ?>
                                        <option value="<?= $limit ?>"
                                            <?php if (isset($limit_change)) {
                                                echo $limit_change == $limit ? 'selected' : '';
                                            } else {
                                                echo $_SESSION['limit-backup'] == $limit ? 'selected' : '';
                                            } ?>>
                                            <?= $limit ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function () {
        $('.page-<?= $page ?>').addClass('active');
        if (<?= $page ?> === 1) {
            $('.previous').addClass('disabled');
        }
    })();

    $(document).ready(function () {
        $('#limit-records').change(function () {
            $('#pages').submit();
        });
    });
</script>
</body>
</html>